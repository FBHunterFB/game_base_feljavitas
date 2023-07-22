using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;

namespace Command_Line_Application.Modell
{
    public class Developer : User
    {
        public string Publisher { get; set; }

        List<Game> Games { get; set; }

        public Developer(string publisher, List<Game> games)
        {
            Publisher = publisher;
            Games = games;
        }

        public Developer()
        {

        }

        public override string ToString()
        {
            return $"{ID}, \n \t - {Username}, \n \t - {Password}, \n \t - {EMail}, \n \t {Publisher}";
        }
    }
}
