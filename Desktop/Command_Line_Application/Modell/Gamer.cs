using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;

namespace Command_Line_Application.Modell
{
    public class Gamer : User
    {
        public int Balance { get; set; }

        List<Game> Games { get; set; }

        public Gamer(int balance, List<Game> games)
        {
            Balance = balance;
            Games = games;
        }

        public Gamer()
        {

        }

        public override string ToString()
        {
            return $"{Username}: \n \t - {ID}, \n \t - {Password}, \n \t - {EMail}, \n \t - Játékok : ";
        }
    }
}
