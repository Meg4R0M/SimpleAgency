export default class ContactButton {

  static init() {
    let $contactButton = $('#contactButton');
    $contactButton.click(e => {
      e.preventDefault();
      $('#contactForm').slideDown();
      $contactButton.slideUp();
    });
  }

}

