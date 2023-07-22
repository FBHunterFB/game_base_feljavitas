using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;

namespace Command_Line_Application.Modell
{
    public class Frontdesk : User, IRealName
    {
        public string RealName { get; set; }

        public Frontdesk(string realName)
        {
            RealName = realName;
        }

        public Frontdesk()
        {

        }

        public override string ToString()
        {

            return $"{RealName}: \n \t - {Username}, \n \t - {ID}, \n \t - {Password}, \n \t - {EMail}";

        }
    }
}
