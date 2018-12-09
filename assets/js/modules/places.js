import P from 'places.js';

export default class Places {

  static init() {
    let inputAddress = document.querySelector('#property_address')
    if (inputAddress !== null) {
      let place = P({
        container: inputAddress
      })
      place.on('change', e => {
        document.querySelector('#property_city').value = e.suggestion.city
        document.querySelector('#property_postal_code').value = e.suggestion.postcode
        document.querySelector('#property_lat').value = e.suggestion.latlng.lat
        document.querySelector('#property_lng').value = e.suggestion.latlng.lng
      })
    }

    let searchAddress = document.querySelector('#search_address')
    if (searchAddress !== null) {
      let place = P({
        container: searchAddress
      })
      place.on('change', e => {
        document.querySelector('#lat').value = e.suggestion.latlng.lat
        document.querySelector('#lng').value = e.suggestion.latlng.lng
      })
    }
  }

}