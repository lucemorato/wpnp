<?php
/**
 * @author Katija Jurić i Lucija Mikulić
 * @copyright 2022
 */

require_once('./system/AppCore.class.php');
require_once('./system/includes/autoloader.inc.php'); //TODO: di stavljamo autoloader require?

 /**
  * index.php je pocetna stranica koja pokrece AppCore klasu
  */

  new AppCore(); //TODO: jesmo li mi na ovaj nacin od klase AppCore instancirali objekt ili? zasto se to tako pise?