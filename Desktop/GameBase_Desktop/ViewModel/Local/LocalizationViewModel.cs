using GameBase_Desktop.View.BaseClass;
using System;
using System.Collections.Generic;
using System.Collections.ObjectModel;
using System.Linq;
using System.Text;
using System.Threading.Tasks;

namespace GameBase_Desktop.ViewModel.Local
{
    public class LocalizationViewModel : ViewModelBase
    {
        public string CurrentLanguage
        {
            get { return selectedLanguage; }
        }


        public string selectedLanguage;
        public string SelectedLanguage
        {
            get { return selectedLanguage; }

            set
            {
                selectedLanguage = value;
                OnPropertyChanged(nameof(CurrentLanguage));
            }
        }
        public ObservableCollection<string> AllLanguage { get; set; }

        public LocalizationViewModel()
        {
            AllLanguage = new ObservableCollection<string>(
                new List<string> { "hu-HU", "en-US" }
                );
        }
    }
}
