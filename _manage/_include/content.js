
// constants
var initX       = 3; // x-coordinate of top left corner of dropdown menu 
var initY       = 115; // y-coordinate of top left corner of dropdown menu 
var backColor   = '#E6E6E6'; // the background color of dropdown menu, set empty '' for transparent
var borderColor = 'black'; // the color of dropdown menu border
var borderSize  = '1'; // the width of dropdown menu border
var itemHeight  = 10;
var xOverlap    = 5;
var yOverlap    = 10;
//

// Don't change these parameters
var delay        = 500; /////
var menuElement  = new Array ();
var usedWidth    = 0;
var numOfMenus   = 0;
/// ----------------------------

menuContent     = new Array ();

menuContent [0] = new Array ( 
-1, // the id of parent menu, -1 if this is a first level menu
-1, // the number of line in parent menu, -1 if this is a first level menu
115, // the width of current menu list 
-1, // x coordinate (absolute) of left corner of this menu list, -1 if the coordinate is defined from parent x-coordinate
-1, // y coordinate (absolute) of left corner of this menu list, -1 if the coordinate is defined from parent y-coordinate
new Array (
'Þirket Profili', '/admin/_manage/metin/profil.php',
'Sipariþ & Teslimat', '/admin/_manage/metin/sip_tes.php',
'Haberler & Duyurular', '/admin/_manage/metin/haberler.php'
));

menuContent [1] = new Array ( 
-1, 
-1,
90,
-1, // x coordinate (absolute) of left corner of this menu list, -1 if the coordinate is defined from parent x-coordinate
-1, // y coordinate (absolute) of left corner of this menu list, -1 if the coordinate is defined from parent y-coordinate
new Array (
'Yönetici Bilgileri', '/admin/_manage/admin/info.php',
'Üye Listesi', '/admin/_manage/uyeler/goruntule.php'
));

menuContent [2] = new Array ( 
-1, 
-1,
101,
-1, // x coordinate (absolute) of left corner of this menu list, -1 if the coordinate is defined from parent x-coordinate
-1, // y coordinate (absolute) of left corner of this menu list, -1 if the coordinate is defined from parent y-coordinate
new Array (
'Döviz Kurlarý', '/admin/_manage/urunler/kurlar.php',
'Reyon & Kategori', '/admin/_manage/urunler/reyonlar.php',
'Ürün Listesi', '/admin/_manage/urunler/goruntule.php',
'Ürün Ekle', '/admin/_manage/urunler/ekle.php',
'Ürün Özellikleri', '/admin/_manage/urunler/ozellikler.php',
'Ürün Resimleri', '/admin/_manage/urunler/upload.php'
));

menuContent [3] = new Array ( 
-1, 
-1,
91,
-1, // x coordinate (absolute) of left corner of this menu list, -1 if the coordinate is defined from parent x-coordinate
-1, // y coordinate (absolute) of left corner of this menu list, -1 if the coordinate is defined from parent y-coordinate
new Array (
'SSS Görüntüle', '/admin/_manage/sss/goruntule.php',
'SSS Ekle', '/admin/_manage/sss/ekle.php'

));

menuContent [4] = new Array ( 
-1, 
-1,
122,
-1, // x coordinate (absolute) of left corner of this menu list, -1 if the coordinate is defined from parent x-coordinate
-1, // y coordinate (absolute) of left corner of this menu list, -1 if the coordinate is defined from parent y-coordinate
new Array (
'Sipariþleri Görüntüle', '/admin/_manage/siparis/goruntule.php'
));


menuContent [5] = new Array ( 
-1, 
-1,
75,
-1, // x coordinate (absolute) of left corner of this menu list, -1 if the coordinate is defined from parent x-coordinate
-1, // y coordinate (absolute) of left corner of this menu list, -1 if the coordinate is defined from parent y-coordinate
new Array (
'Sistemden Çýkýþ', '/admin/cikis.php'
));


