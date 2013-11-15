````php
/**
 * Do something
 *
 * Denna funktion kommer skicka mail till valfri person, se parametrarna.
 * Du kan sätta send till false om du inte vill skicka på riktgit vilket
 * kanske är bra i debug-läge
 *
 * @param {string} email  E-post adressen till personen vi ska skicka mail till
 *                        Om det inte är en riktig email kommer fel returneras
 * @param {boolean} send  Om 'false' så kommer vi inte skicka ett mail på riktigt
 *
 * @return {string}       Meddelandet som skickades till epost adressen
 */
function doSomething($email, $send = true) {
  // räknar ut värder av lite viktiga siffror
  $answer = addsNumber(1, 1);
  return 0;
}

function addsNumber($int1, $int2) {
  return $int1 + $int2;
}

echo doSomething('alex@aross.se');
echo doSomething('alex@aross.se', false);
````
