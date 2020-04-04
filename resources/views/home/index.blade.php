@extends('layouts.app')

@section('content')
    <div class="mb-2">
        <h1 class="d-inline-block">
            Statistika Slovenije
        </h1>

        @if ($question)
            <div class="float-right d-flex">
                <div class="float-left d-flex align-items-center">
                    <i class="fas fa-2x fa-comments mr-3"></i>
                </div>
                <a href="{{ route('questions.show', $question) }}">
                    {{ $question->content }}
                    <br class="mobile-hidden">
                    Pridruži se debati!
                </a>
            </div>
        @endif
        <div class="clearfix"></div>
    </div>

    @include('home.partials.counters')

    <h2>
        Koronavirus v Sloveniji
    </h2>
    <p>
        Koronavirus (COVID-19) je nalezljiva bolezen, ki jo povzroča novo odkrit koronavirus. V Sloveniji je bil prvič odkrit 4. Marca, najverjetneje se je prenesel iz Italije.
    </p>
    <p>
        Slovenija je 12. marca ob 18. uri na podlagi 7. člena zakona o nalezljivih boleznih zaradi naraščanja števila primerov okužb s koronavirusom razglasila epidemijo. Aktiviran je tudi državni načrt. Podlaga za razglasitev epidemije je strokovno mnenje NIJZ. S tem sledimo razglasitvi pandemije Svetovne zdravstvene organizacije.
    </p>

    @include('home.partials.charts')

    <h3>Simptomi</h3>
    <p>
        Pri večini ljudi, okuženih z virusom COVID-19, se bodo pojavile blage do zmerne bolezni dihal in okrevale, ne da bi pri tem potrebovali posebno zdravljenje. Starejše osebe in tisti z osnovnimi zdravstvenimi težavami, kot so srčno-žilne bolezni, diabetes, kronične bolezni dihal in rak, imajo večjo verjetnost, da bodo razvili resne bolezni.
    </p>

    <h3>Kako se širi?</h3>
    <p>
        Virus COVID-19 se širi predvsem skozi kapljice sline ali izcedek iz nosu, ko okuženi človek kašlja ali kiha, zato je pomembno, da prakticirate tudi dihalno etiketo (na primer s kašljanjem na upognjen komolec) in uporabo ustrezne zaščitne maske in rokavic.
    </p>

    <h3>Preprečevanje okužbe</h3>
    <p>
        Najboljši način za preprečevanje in upočasnitev prenosa je dobro informiranje o virusu COVID-19, kako nastane in kako se širi. Zaščitite sebe in druge pred okužbo tako, da si pogosto umivate roke ali uporabljate alkoholno drgnjenje in se ne dotikate obraza.
    </p>

    @include('home.partials.table')

    <h3>
        Ali vas skrbi, da ste okuženi? 
    </h3>

    <p>
        Če ste zboleli (kašelj, vročina, težko dihanje), prosimo, da:
        <ul>
            <li>Ostanete doma in se izogibajte stikom z ljudmi.</li>
            <li>Pokličete osebnega zdravnika oz. dežurnega zdravnika v najbližji dežurni ambulanti, če kličete izven delovnega časa vašega zdravnika.</li>
            <li>Zdravnik bo potrdil ali ovrgel sum na okužbo. Če bo sum upravičen, vas bo napotil na najbližjo zdravstveno ustanovo - vstopno točko za odvzem brisa.</li>
            <li>Do te zdravstvene ustanove se peljite z osebnim avtomobilom in ne z javnim prevozom (vlak, avtobus, taksi). Kašljajte v robec ali rokav. Pred odhodom od doma si umijte roke z vodo in milom.</li>
            <li>Zdravnik, ki vam bo vzel bris, bo glede na vaše zdravstveno stanje ocenil, kje boste počakali na rezultate testa.</li>
            <li>Po prejemu rezultata vas bo zdravnik obvestil o nadaljnjih ukrepih.</li>
        </ul>
    </p>

    <p>
        V pomoč prebivalcem pri iskanju zanesljivih informacij v zvezi z novim koronavirusom je Urad vlade za komuniciranje v sodelovanju z Ministrstvom za zdravje, Nacionalnim inštitutom za javno zdravje, Infekcijsko kliniko, Upravo RS za zaščito in reševanje ter Ministrstvom za javno upravo vzpostavil klicni center.
    </p>
    <p>
        Na brezplačni telefonski številki 080 1404 lahko dobite informacije vsak dan med 8. in 20. uro. Če kličete iz tujine, je klicni center dosegljiv na +386 1 478 7550
    </p>
    <p>
        Klicateljem na vprašanja odgovarjajo študentje višjih letnikov Medicinske fakultete pod mentorstvom ustreznih strokovnih služb / strokovnjakov.
    </p>

    <h3>
        Pomembni napotki
    </h3>

    <h4>
        Kaj je izolacija?
    </h4>
    <p>
        Izolacija je ukrep, ki ga osebni izbrani zdravnik odredi bolni osebi s COVID-19 in pomeni, da oseba ne sme zapuščati doma, da mora omejiti stike z ostalimi osebami in dosledno upoštevati priporočila za preprečevanje širjenja bolezni.
        <br/>
        Izolacija je izjemno pomemben ukrep, ki ga je potrebno dosledno upoštevati. Bolnik, ki je v izolaciji, je v bolniškem staležu. Izolacija je ukrep, ki je odrejen vsem, ki imajo potrjeno okužbo z novim koronavirusom za najmanj 14 dni ali več, če je potek bolezni težji.
    </p>


    <h4>
        Kaj je samoizolacija?
    </h4>
    <p>
        Samoizolacija je ukrep za osebe z akutno okužbo dihal, ki nimajo potrjene okužbe s COVID-19.
        <br />
        Bolnik ostaja doma toliko časa, kolikor trajajo simptomi bolezni (najmanj pa 14 dni) in se vrne v službo oz. v drug kolektiv, ko je zdrav. Bolnik v samoizolaciji poskrbi za skrbno higieno in upošteva nasvete za zmanjšanje možnosti prenosa okužbe. Je v bolniškem staležu.
    </p>

    <h4>
        Kaj je socialno distanciranje?
    </h4>
    <p>
        Socialno distanciranje pomaga pri zajezitvi širjenja nalezljivih bolezni, ki se prenašajo kapljično. Še posebej za osebe, ki so zdrave, vendar so bile v tesnem stiku z osebo, pri kateri je bila potrjena okužba s COVID-19. Visoko tvegani so predvsem družinski kontakti, saj je prav v domačem okolju največ možnosti za prenos novega koronavirusa. Socialno distanciranje je priporočilo in ne obveza posamezniku. Tisti, ki ne morejo dela opravljati od doma, lahko hodijo v službo, vendar naj se čim bolj pozorno samoopazujejo in prenehajo z delom ob pojavu bolezenskih težav. Pomeni predvsem upoštevanje navodil, da se brez potrebe ne družimo z osebami izven skupnega gospodinjstva, pazimo na razdaljo 1,5 m, v trgovino gremo čim manjkrat in takrat, ko ni veliko ljudi, kar največ poskusimo opraviti preko spletnih strani. Zelo smo pozorni glede higiene. Vsekakor pa osebam ni odvzeta svoboda gibanja, bolj ključno je razumevanje, da z ustreznim ravnanjem zmanjšujejo možnost širjenja okužbe in prispevajo k obvladovanju pandemije COVID-19. Oseba ni v bolniškem staležu.
    </p>

    <h3>
        Koristne povezave
    </h3>

    <ul>
        <li>
            <a href="https://www.gov.si/teme/koronavirus/" target="_blank">
                Gov.si - Koronavirus COVID-19
                <small class="ml-1">
                    <i class="fas fa-external-link-alt"></i>
                </small>
            </a>
        </li>
        <li>
            <a href="https://www.nijz.si/sl/koronavirus-pogosta-vprasanja-in-odgovori#se-nov-koronavirus-imenuje-sars-cov-2-ali-covid-19%3F" target="_blank">
                Koronavirus - pogosta vprašanja in odgovori
                <small class="ml-1">
                    <i class="fas fa-external-link-alt"></i>
                </small>
            </a>
        </li>
        <li>
            <a href="https://www.nijz.si/sl/koronavirus-2019-ncov" target="_blank">
                Koronavirus (SARS-CoV-2) - ključne informacije
                <small class="ml-1">
                    <i class="fas fa-external-link-alt"></i>
                </small>
            </a>
        </li>
        <li>
            <a href="https://www.nijz.si/sl/dnevno-spremljanje-okuzb-s-sars-cov-2-covid-19" target="_blank">
                Dnevno spremljanje okužb s SARS-CoV-2 (COVID-19)
                <small class="ml-1">
                    <i class="fas fa-external-link-alt"></i>
                </small>
            </a>
        </li>
    </ul>

    @includeWhen($poll, 'home.partials.poll')
@endsection
