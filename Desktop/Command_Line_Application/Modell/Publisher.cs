using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;

namespace Command_Line_Application.Modell
{
    public class Publisher : User
    {
        List<Developer> Developers { get; set; }

        List<Game> Games { get; set; }

        public Publisher(List<Developer> developers, List<Game> games)
        {
            Developers = developers;
            Games = games;
        }

        public Publisher()
        {

        }

        public override string ToString()
        {
            return $"{ID}, \n \t - {Username}, \n \t - {Password}, \n \t - {EMail}, \n \t - Fejlesztő : , \n \t - Játékok :";
        }
    }
}
