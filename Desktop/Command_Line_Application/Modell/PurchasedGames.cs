using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;

namespace Command_Line_Application.Modell
{
    class PurchasedGames : User
    {
        public string GameName { get; set; }
        public DateTime PurchasedTime { get; set; }
        public string Owner { get; set; }


        public PurchasedGames()
        {

        }

        public PurchasedGames(string gameName, DateTime purchasedTime, string owner)
        {
            GameName = gameName;
            PurchasedTime = purchasedTime;
            Owner = owner;
        }

        public override string ToString()
        {
            return $"Tulajdonos: {Owner} \n \t Vásárlás ideje: {PurchasedTime} \n \t Játék neve: {GameName}";
        }
    }
}
