using Command_Line_Application.Enum;
using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;

namespace Command_Line_Application.Modell
{
    public class Game
    {
        public int ID { get; set; }

        public string Title { get; set; }

        public DateTime ReleaseDate { get; set; }

        public Developer Developer { get; set; }

        public Publisher Publisher { get; set; }

        public Pegi Pegi { get; set; }

        public Rating Rating { get; set; }

        public List<string> Genre { get; set; }

        public List<Gamer> Gamers { get; set; }

        public Game()
        {

        }

        public Game(int id, string title, DateTime releaseDate, Developer developer, Publisher publisher, Pegi pegi, Rating rating, List<string> genre, List<Gamer> gamers)
        {
            ID = id;
            Title = title;
            ReleaseDate = releaseDate;
            Developer = developer;
            Publisher = publisher;
            Pegi = pegi;
            Rating = rating;
            Genre = genre;
            Gamers = gamers;
        }

        public override string ToString()
        {
            return base.ToString();
        }
    }
}
