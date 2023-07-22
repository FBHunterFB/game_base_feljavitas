using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;

namespace Command_Line_Application.Modell
{
    public abstract class User
    {
        public long ID { get; set; }

        public string Username { get; set; }

        public string Password { get; set; }

        public string EMail { get; set; }

        public string Name { get; set; }

        public User(long iD, string username, string password, string eMail, string name)
        {
            ID = iD;
            Username = username;
            Password = password;
            EMail = eMail;
            Name = name;
        }

        public User()
        {

        }

    }
}
