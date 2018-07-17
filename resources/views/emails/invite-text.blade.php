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
<h3>Hey {{ $inviter }}</h3>
<p>
   Ik wil van oma al haar mooie herinneringen en verhalen vastleggen, zodat we haar leven mooi kunnen documenteren.
   <br>Om dit te doen is er een applicatie genaamd Prisma.
   <br>Heb je deze week ergens een halfuurtje om een verhaal toe te voegen?
   <br>Hieronder vind je een link naar een formulier waar je het verhaal kan toevoegen en de andere om het verhaal te bekijken op haar profiel.
   <br>Groetjes Cedric
</p>
<p><a href="https://airtable.com/shrJiFcGZhAgDQLPL">Voeg een verhaal toe!</a></p>
<p><a href="http://146.185.134.55/residents/NaamFamilielid/stories">Bekijk jouw verhalen</a></p>

<p><a href="{{ route('password.set',['token'=>$token]) }}" target="_blank">Bevestig je e-mail adres via deze
        link</a> en kies daarna een wachtwoord.</p>

<p></p>

<div>
   <h1>Gids om familie te interviewen</h1>
   <h2>Hoe kan je familie interviewen</h2>
   <p>Jouw ouders en grootouders hebben een schat aan familieverhalen die je niet verloren kan laten gaan.
      <br>Ontdek de verhalen aan de hand van inspirerende onderwerpen en vragen.</p>
   <p><a href="https://prisma.care/reminiscentie-kaarten/">Inspiratie voor een goede babbel? Klik hier!</a></p>
</div>
@endcomponent
