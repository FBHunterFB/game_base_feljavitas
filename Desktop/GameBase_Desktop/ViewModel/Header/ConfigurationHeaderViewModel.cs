﻿//using GalaSoft.MvvmLight.Command;
using GameBase_Desktop.View.BaseClass;
using GameBase_Desktop.ViewModel.BaseClass;
using GameBase_Desktop.ViewModel.Local;
using Microsoft.Extensions.Logging;
using Serilog;
using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;

namespace GameBase_Desktop.ViewModel.Header
{
    public class ConfigurationHeaderViewModel : ViewModelBase
    {
        private ViewModelBase selectedView;

        public ViewModelBase SelectedView
        {
            get
            {
                return selectedView;
            }
            set
            {
                selectedView = value;
                OnPropertyChanged(nameof(SelectedView));
            }
        }

        public RelayCommand UpdateViewCommand { get; set; }

        private LocalizationViewModel localizationView;
        private ILogger<ConfigurationHeaderViewModel> logger;

        public ConfigurationHeaderViewModel(ILogger<ConfigurationHeaderViewModel> logger, LocalizationViewModel localizationViewModel)
        {
            this.logger = logger;
            localizationView = localizationViewModel;
            UpdateViewCommand = new RelayCommand(
                (parameter) => ChangeView(parameter)
            );
        }

        public void ChangeView(object viewName)
        {
            if (viewName != null)
            {
                if (viewName is string)
                {
                    switch (viewName)
                    {
                        case "SelectLanguage":
                            //SelectedView= new LocalizationViewModel();
                            logger.LogInformation($"{nameof(ConfigurationHeaderViewModel)} -> A nyelv választás menüpontot választotta");
                            SelectedView = localizationView;
                            break;
                    }
                }
            }
        }

    }
}
