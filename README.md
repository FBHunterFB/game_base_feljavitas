# GameBase - 2023

`Csapattagok:`
> Fendrik Bence,
> Budai Balázs,
> Bernát Bence

### Program részei

|  Típus | Kiterjesztés   |  Tartalma  |
| ------------ | ------------ | ------------ |
|  [Weboldal](https://new.bendev.hu/school/ "Weboldal")  ( GameBase - WEB)  |  .html  | Vue, Bootstrap, jQuery  |
|  Android  ( AndroidProjekt )  | .java  | Fragment, Material Design  |
| Desktop | .cs | . |

### Program felépítése
`Frontend`
- Axios - HTTP kliens
- Bootstrap - Stílus

**A weboldal célja:**
	Több funkcióval bír, mint a mobil alkalmazás. Különböző felhasználói csoportok vannak (Admin, Mod, User) akik más-más jogosultságokkal rendelkeznek

**User**  - Alapértelmezett felhasználó. Játékokat tud vásárolni és letölteni.
**Mod** – Játékokat tud felvenni az adatbázisban.
**Admin** – Teljes hozzáférése van az oldalhoz. A mod jogosultságain kívül a felhasználók egyenlegét is tudja szerkeszteni.

**Tervezés lépései: **
A weboldal tervezése folyamán elsődleges szempont volt az egyszerű kezelhetőség, hogy a felhasználók könnyedén megtalálják az összes menüpontot. Az oldal reszponzív felépítése szintén fontos szempont volt hiszen attól függetlenül, hogy van mobilos alkalmazás szerettük volna, hogy aki nem rendelkezik a mobilos alkalmazással annak is az oldalon keresztül ugyan azt az élményt tudjuk nyújtani, mint aki számitógépen keresztül használja. 

A következő lépés az volt, hogy a kigondolt funkciókat implementáljuk, amelyeknek a fő elemei a lekérdezés, módosítás, törlés, hozzáadás. A megvalósítás folyamán tesztadatokkal ellenőriztük az oldal működését. 

Miután az összes teszt megfelelően működött összekötöttük az oldalt az adatbázissal. 

**Alkalmazott megoldások: **
	
	Vuejs (Műveletek végrehajtása) – Online könyvtárból importálva (jsdelivr.net)
	Vue-Cookies (Kisebb adatok tárolása) - Online könyvtárból importálva (jsdelivr.net)
	Fontawesome (Ikonok) - Online könyvtárból importálva (fontawesome.com)
	Bootstrap (Stílus) - Online könyvtárból importálva (jsdelivr.net)

**Tovább fejlesztési lehetőségek:**
	Közösségi funkciók: Csevegés, Barátok, Barátok játékai, Közösségi fórum (Segítségkérés és nyújtás céljából).


`Android APK`

**Az android apk célja:**
	Kevesebb funkcióval rendelkezik, mint a weboldal azonban azért lett ez létrehozva, hogy a felhasználóknak ne kelljen mindig weboldalon keresztül használni az alkalmazást. Amennyiben a felhasználó megakarja nézni, hogy a játékok mennyibe kerülnek vagy éppen milyen játékokat vásárolt meg akkor az alkalmazás erre gyorsabb megoldás.


**Tervezés lépései: **
	Mivel a rendszer elsődleges megoldása a weboldal ezért az Androidos alkalmazást kiegészítő lehetőségnek szántuk ezért tervezetten kevesebb funkcióval bír. Miután összeszedtük, hogy mik azok a lényeges dolgok, amiket a felhasználó elsősorban szeretne látni az alkalmazásban elkezdtük létrehozni az alkalmazás kinézetét, amiben szintén lényeges volt az egyszerű, letisztult stílus. 

A következő lépésünk az volt, hogy a létrehozott elemeknek teszt adatokat adjunk, amivel tudjuk tesztelni a program működését és megjelenését. 

A sikeres tesztek után összekötöttük a programot a backend-el annak érdekében, hogy a teszt adatok helyett már valós adatokkal működjön a program. 

Végső folyamatként létrehoztuk az apk fájlt, amivel telepíthető az alkalmazás a telefonra. 

**Alkalmazott megoldások: **
	http Connection – A backend műveletek végrehajtására
	Toast – A műveletek visszajelzéseire
	Fragment – A navigációs menü kialakítására

**Tovább fejlesztési lehetőségek: **
-	A közösségi funkciók közül a csevegés és a barát lista implementálása
