<footer class="py-5 bg-light">
    <div class="container">
        <div class="row">
            <div class="col-lg-4 col-md-12 text-center">
                <h4>Réseaux sociaux</h4>
                <ul class="list-inline">
                    <a href="/" class="nav-link"><li><i class="fab fa-facebook-square"></i> Facebook</li></a>
                    <a href="/" class="nav-link"><li><i class="fab fa-twitter-square"></i> Twitter</li></a>
                    <a href="/" class="nav-link"><li><i class="fab fa-instagram"></i> Instragram</li></a>
                </ul>
            </div>
            <div class="col-lg-4 col-md-12 text-center">
                <h4>Aide</h4>
                <ul class="list-inline">
                    <a href="{{ route('tutogpx') }}" class="nav-link"><li>Tutoriel GPX</li></a>
                    <a href="{{ route('tutoriel') }}" class="nav-link"><li>FAQ</li></a>
                    <a href="{{ route('cgu') }}" class="nav-link"><li>C.G.U</li></a>
                </ul>
            </div>
        </div>
        <div class="text-center small">
            &copy; Speedrun {{ date('Y') }}
        </div>
    </div>
</footer>
</div>
@yield('page-specific-scripts')
</body>
</html>