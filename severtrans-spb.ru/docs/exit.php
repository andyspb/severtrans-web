<?php
session_start();
if (empty($_SESSION['inn']) or empty($_SESSION['password'])) 
{
exit ("Р”РѕСЃС‚СѓРї РЅР° СЌС‚Сѓ СЃС‚СЂР°РЅРёС†Сѓ СЂР°Р·СЂРµС€РµРЅ С‚РѕР»СЊРєРѕ Р·Р°СЂРµРіРёСЃС‚СЂРёСЂРѕРІР°РЅРЅС‹Рј РїРѕР»СЊР·РѕРІР°С‚РµР»СЏРј. Р•СЃР»Рё РІС‹ Р·Р°СЂРµРіРёСЃС‚СЂРёСЂРѕРІР°РЅС‹, С‚Рѕ РІРѕР№РґРёС‚Рµ РЅР° СЃР°Р№С‚ РїРѕРґ СЃРІРѕРёРј Р»РѕРіРёРЅРѕРј Рё РїР°СЂРѕР»РµРј<br><a href='index.html'>Р“Р»Р°РІРЅР°СЏ СЃС‚СЂР°РЅРёС†Р°</a>");
}

unset($_SESSION['password']);
unset($_SESSION['inn']);
unset($_SESSION['txt']);


exit("<html><head><meta http-equiv='Refresh' content='0; URL=index.html'></head></html>");

?>