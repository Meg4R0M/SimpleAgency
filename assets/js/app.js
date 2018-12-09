import '../styles/main.scss'

let $ = require('jquery');
import 'select2';
import 'bootstrap/dist/js/bootstrap'
import Places from './modules/places'
import Map from './modules/map'
import DeleteImage from './modules/deleteImage'
import ContactButton from './modules/contactButton'

ContactButton.init();
DeleteImage.init();
Map.init();
Places.init();

$('#options').select2();
$('#property_options').select2();
