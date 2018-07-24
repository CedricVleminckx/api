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
<p>Stuur een mail naar {{ $sender }} als je vragen hebt.</p>
<p><a href="http://146.185.134.55/residents/NaamFamilielid/stories">Bekijk jouw verhalen</a></p>

@if ($token != 'NoToken')
    <p><a href="{{ route('password.set',['token'=>$token]) }}" target="_blank">Bevestig je e-mail adres via deze
        link</a> en kies daarna een wachtwoord.</p>
@endif

<p></p>

<div>
    <h1></h1>
   <h1>Gids om familie te interviewen</h1>
   <h2>Hoe kan je familie interviewen</h2>
   <p>Jouw ouders en grootouders hebben een schat aan familieverhalen die je niet verloren kan laten gaan.
      <br>Ontdek de verhalen aan de hand van inspirerende onderwerpen en vragen.</p>
   <p><a href="https://prisma.care/reminiscentie-kaarten/">Inspiratie voor een goede babbel? Klik hier!</a></p>
</div>
@endcomponent
