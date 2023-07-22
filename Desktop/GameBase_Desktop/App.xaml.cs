using Microsoft.Extensions.Hosting;
using Serilog;
using System;
using System.Collections;
using System.Collections.Generic;
using System.Configuration;
using System.Data;
using System.Linq;
using System.Threading.Tasks;
using System.Windows;
using Microsoft.Extensions.DependencyInjection;
using GameBase_Desktop.ViewModel;
using GameBase_Desktop.ViewModel.Header;
using GameBase_Desktop.View.Configuration;

namespace GameBase_Desktop
{
    /// <summary>
    /// Interaction logic for App.xaml
    /// </summary>
    public partial class App : Application
    {
        private readonly IHost host;

        public App()
        {
            Log.Logger = new LoggerConfiguration()
                .Enrich.FromLogContext()
                .WriteTo.Console()
                .WriteTo.File($"log\\log.txt")
                .CreateLogger();

            Log.Logger.Information("Applikáció elindult...");

            host = Host.CreateDefaultBuilder().UseSerilog().ConfigureServices(services =>
            {
                services.AddSingleton<MainWindowViewModel>();
                services.AddSingleton<MainWindow>(s => new MainWindow()
                {
                    DataContext = s.GetRequiredService<MainWindowViewModel>()
                });

                services.AddSingleton<ConfigurationHeaderViewModel>();
                services.AddSingleton<ConfigurationHeaderView>(
                    service => new ConfigurationHeaderView()
                    {
                        DataContext = service.GetRequiredService<ConfigurationHeaderViewModel>()
                    });

                

            }).Build();
        }

        protected async override void OnStartup(StartupEventArgs e)
        {
            await host.StartAsync();

            try
            {
                var window = host.Services.GetRequiredService<MainWindow>();
                window.Show();
                Log.Logger.Information("Az ablak megjelent");
            }
            catch (Exception ex)
            {
                Log.Logger.Information($"{ex.Message}");
            }

            base.OnStartup(e);
        }

        protected override async void OnExit(ExitEventArgs e)
        {
            await host.StopAsync();
            host.Dispose();
            Log.Logger.Information("Kilépés az aplikációból");
            base.OnExit(e);
        }
    }
}
