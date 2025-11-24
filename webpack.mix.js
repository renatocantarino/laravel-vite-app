import mix from 'laravel-mix';

// Agrupar estilos vendor (caminhos corretos em public/assets)
mix.styles([
    'public/assets/packages/bootstrap/bootstrap.css',
    'public/assets/packages/o2system-ui/o2system-ui.css',
    'public/assets/packages/owl-carousel/owl-carousel.css',
    'public/assets/packages/cloudzoom/cloudzoom.css',
    'public/assets/packages/thumbelina/thumbelina.css',
    'public/assets/packages/bootstrap-touchspin/bootstrap-touchspin.css',
    'public/assets/css/theme.css'
], 'public/css/vendor.css');


// Compilar/concatenar JS vendor
mix.scripts([
    'public/assets/js/jquery.js',
    'public/assets/js/jquery-migrate.js',
    'public/assets/packages/bootstrap/libraries/popper.js',
    'public/assets/packages/bootstrap/bootstrap.js',
    'public/assets/packages/o2system-ui/o2system-ui.js',
    'public/assets/packages/owl-carousel/owl-carousel.js',
    'public/assets/packages/cloudzoom/cloudzoom.js',
    'public/assets/packages/thumbelina/thumbelina.js',
    'public/assets/packages/bootstrap-touchspin/bootstrap-touchspin.js',
    'public/assets/js/theme.js'
], 'public/js/vendor.js');

// Versionamento para cache
mix.version();