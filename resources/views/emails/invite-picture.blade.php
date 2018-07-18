@component('mail::message')
<style>
   a{
      color: #0645AD;
      text-decoration: none;
   }
   div{
      border-top: 1px solid black;
   }
</style>
<body>
<p>Hey {{ $inviter }}</p>
<p>
   {{ $content }}
</p>
<p><a href="https://airtable.com/shriNrmXfpIq5zf93">Voeg een verhaal toe!</a></p>
<p><a href="http://146.185.134.55/residents/NaamFamilielid/stories">Bekijk jouw verhalen</a></p>

@if ($token != 'NoToken')
    <p><a href="{{ route('password.set',['token'=>$token]) }}" target="_blank">Bevestig je e-mail adres via deze
        link</a> en kies daarna een wachtwoord.</p>
@endif

<p></p>

<div>
    <h1></h1>
   <h2>Hoe scan ik foto's?</h2>
   <p>Foto&rsquo;s scannen kan ook gemakkelijk zijn. Met een smartphone, tablet of computer digitaliseer je je fotoalbums in 1&ndash;2&ndash;3.
      <br>
      <a href="https://prisma.care/aan-de-slag-met-prisma/fotos-digitaliseren/">Tips om te scannen? Klik hier!</a>
   </p>
   <h3>Google Photos</h3>
   <p><a href="https://www.google.com/photos/about/">Google Photos</a> is een gratis platform waarop je foto’s kunt uploaden en synchroniseren op verschillende toestellen.</p>
   <p>Hoe krijg je je foto’s in Google Photos en vervolgens naar Prisma?</p>
   <ol>
      <li>Maak een Google Photos account aan (als je dat nog niet gedaan hebt).</li>
      <li> Log in via een browser op je computer.</li>
      <li>Laad foto’s van je computer op naar Google Photos.</li>
      <li>Installeer de Google Photos app op het mobiel toestel waarop je Prisma gebruikt en log in met de account die je in stap 1 aanmaakte.
         <br>Zo heb je ook op je toestel toegang tot de foto’s die je op Google Photos hebt opgeslagen.</li>
      <li>Nu kan je in de Prisma app de foto’s toevoegen via Kies foto van camerarol.</li>
   </ol>
   <h3>Google PhotoScan</h3>
   <p><a href="https://play.google.com/store/apps/details?id=com.google.android.apps.photos.scanner&hl=en">PhotoScan</a> van Google is een applicatie voor mobiele toestellen waarmee je gemakkelijk foto’s kunt digitaliseren, rechtstreeks op je GSM.
      <br>Nadat je met de app een foto gescand hebt, is die beschikbaar in je media galerij en dus klaar om toe te voegen aan Prisma.</p>
   <a href="https://www.youtube.com/watch?v=MEyDt0DNjWU">Uitleg PhotoScan</a>
</div>

<br>

<div>
   <h2>Foto’s opzoeken op het internet?</h2>
   <p>Niets beter dan een beeld om herinneringen naar boven te brengen. Zoek op het internet naar foto’s die jullie familieverhalen illustreren.
      <br>
      <a href="https://prisma.care/inspiratie-fotos-en-videos-zoeken-op-het-internet/">Tips om beelden te vinden? Klik hier!</a>
   </p>
   <h3>Stap 1</h3>
   <p>Zoek de favoriete zanger, een gebouw in een bepaalde periode of foto’s van de familie op via Google Search.
      <br>Typ het zoekwoord (bijvoorbeeld “Willy Sommers” in de zoekbalk en klik op “zoeken”) wanneer je op zoek bent naar een foto van je favoriete zanger of artiest.
      <br>Typ het zoekwoord en het jaar (bijvoorbeeld “apotheek Brussel 1984” in de zoekbalk en klik op “zoeken”) voor een gebouw of personen in een bepaalde periode.</p>
   <h3>Stap 2</h3>
   <p>Klik bij de zoekresultaten op “afbeeldingen” en selecteer de gewenste afbeelding.</p>
   <h3>Stap 3</h3>
   <p>Klik op de rechtermuisknop bij de afbeelding die je wil opslaan, klik bij de opties op “opslaan” en geef het bestand een naam.</p>
   <h3>Stap 4</h3>
   <p>Kies op het formulier om een afbeelding up te loaden en kies uploaden vanaf mijn computer.</p>
</div>
@endcomponent
