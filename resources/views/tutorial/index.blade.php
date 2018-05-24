@extends('layouts.app')

@section('content')

    <div class="container pt-5 mt-5" >
        <div class="card mt-5" id="tutorial">
            <div class="card-body">
                <h2>F.A.Q</h2>
                <p>Vous trouverez ici les questions les plus courantes. Vous pouvez également consulter<a
                            href="#"> notre page de tutoriel concernant les données GPX</a></p>
                <hr>

                <p data-toggle="collapse" data-target="#show"><a href="#">Qu'est ce que SpeedRunner ?</a></p>
                <div id="show" class="collapse mb-3">
                    SpeedRunner est un site de running communautaire, avec la possibilité d'importer vos tracés (via données GPX).
                    <a href="#">Consultez notre tuto pour en savoir plus</a>
                </div>

                <p data-toggle="collapse" data-target="#show11"><a href="#">Pourquoi utiliser SpeedRunner alors que j'ai déjà une applications de running</a></p>
                <div id="show11" class="collapse mb-3">
                    Attention les petits potes SpeedRunner n'est pas une application de running à proprement parler. SpeedRunner intervient en complément de celle-ci.
                    SpeedRunner permet de vous comparer vos temps et trajet à d'autres runners, en fonction de vos résultats des points et un classement sont établis.
                    Ces points et ce classement vous permettent de bénéficier de plusieurs avantages auprès de nos partenaires comme des bons de réductions ou des offres exclusives.
                </div>

                <p data-toggle="collapse" data-target="#show2"><a href="#">SpeedRunner est-elle disponible sur mobile ?</a></p>
                <div id="show2" class="collapse mb-3">
                    Pour cette première version, il n'y a pas encore d'application dédié au mobile. Une prochaine version actuellement en développement sera
                    disponible pour mobile.
                </div>

                <p data-toggle="collapse" data-target="#show3"><a href="#">L'utilisation de SpeedRunner est-elle gratuite ?</a></p>
                <div id="show3" class="collapse mb-3">
                    Totalement gratuite, elle sera bientôt disponible sur l'App Store et le Google Play.
                </div>

                <p data-toggle="collapse" data-target="#show4"><a href="#">Mes données sont-elles protégées ?</a></p>
                <div id="show4" class="collapse mb-3">
                    Vos données sont utilisées uniquement dans le cadre de votre utilisation de nos services.
                    SpeedRunner est déclaré à la CNIL afin de respecter la loi informatique et liberté de 1978.
                </div>

                <p data-toggle="collapse" data-target="#show6"><a href="#">Je cours sur tapis, mes activités sont-elles prises en compte dans SpeedRunner</a></p>
                <div id="show6" class="collapse mb-3">
                    SpeedRunner récupère uniquement vos positions GPS via les données GPX. Un tapis de course étant fixe, vos session de courses sur celui-ci ne seront pas comptabilisées.
                </div>

                <p data-toggle="collapse" data-target="#show7"><a href="#">Comment les points sont-ils comptabilisés</a></p>
                <div id="show7" class="collapse mb-3">
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit,
                    sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                    quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
                </div>

                <p data-toggle="collapse" data-target="#show8"><a href="#">Que faire contre les utilisateurs qui trichent ?</a></p>
                <div id="show8" class="collapse mb-3">
                    Si la triche est un sport, celle-ci n’est pas acceptée sur SpeedRunner !
                    Nous comptons sur le fair-play et la convivialité de tous nos utilisateurs.
                    Toutes activités impliquant l'utilisation d'un véhicule est interdite. Notre système détecte les activités suspicieuses grâce à divers paramètres (vitesse moyenne, distance...).
                    Nous contactons dans un premier temps l'utilisateur pour obtenir plus d'information. En cas de triche flagrante et évidente, tous les points seront remis à zéro.
                </div>

                <p data-toggle="collapse" data-target="#show9"><a href="#">Mon tracé ne corresponds pas à ma sortie que dois-je faire ?</a></p>
                <div id="show9" class="collapse mb-3">
                    Vous avez remarqué que votre tracé ne correspondait pas à l'itinéraire que vous avez effectué ?
                    La cause de ce dysfonctionnement est sûrement dûe à une perte temporaire de signal ou a une mauvaise manipulation.
                    <br>
                    Avant de démarrer une activité avec votre application de running veillez à :
                    <ul>
                        <li>Avoir un bon signal GPS</li>
                        <li>Fermer toutes les applications en arrière-plan pour que votre application de running ne se coupe pas faute de mémoire disponible</li>
                    </ul>
                    En cas de problème persistant merci d'écrire à b@b.b
                </div>

                <p data-toggle="collapse" data-target="#show10"><a href="#">Qui peut voir mon profil ?</a></p>
                <div id="show10" class="collapse mb-3">
                    Tous les utilisateur inscrit auront accès à votre profil et pourrons vous contacter.
                    Une version ultérieur permettra de restreindre l'accès uniquement à vos amis.
                </div>

                <p data-toggle="collapse" data-target="#show12"><a href="#">Comment sont calculés les points ?</a></p>
                <div id="show12" class="collapse mb-3">
                    Nous tenons notre algorythme rigoureusement secret mais celui se base, entre autres, sur trois critères majeurs : la distance parcourue, le temps de votre session running, et le dénivelé.
                </div>

            </div>
        </div>
    </div>

@endsection
