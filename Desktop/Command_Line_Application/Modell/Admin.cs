using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;

namespace Command_Line_Application.Modell
{
    public class Admin : User, IRealName
    {
        public string RealName { get; set; }

        public Admin(string realName)
        {
            RealName = realName;
        }

        public Admin()
        {

        }

        public override string ToString()
        {
            return $"{RealName}: \n \t - {Username}, \n \t - {ID}, \n \t - {Password}, \n \t - {EMail}";
        }
    }

}
