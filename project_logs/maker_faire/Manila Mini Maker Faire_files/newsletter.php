
function globalNewsletterSignup(email) {
var inputValues = {
  form_id: 0,
  date_created: '2025-12-13 15:35:36',
  is_starred: 0,
  is_read: 1,
  ip: '::1',
  source_url: 'http://manila.makerfaire.com/wp-content/themes/MiniMakerFaire/js/dynamic/newsletter.php?ver=1765640135',
  currency: 'USD',
  created_by: 1,
  user_agent: 'Mozilla/5.0 (Windows NT 6.1; WOW64; rv:38.0) Gecko/20100101 Firefox/38.0',
  status: 'active',
  1: email
};

var data = {inputValues};
console.log(JSON.stringify(data));
jQuery.ajax({
    url: '/gravityformsapi/entries?api_key=c0564d2ae7&signature=5jvOZWJ7didHdRVkPtf%2FiBZUoBw%3D&expires=1765643736',
    type: 'POST',
    data: JSON.stringify(data)
  })
  .done(function( data ) {
    if ( console && console.log ) {
      console.log( "Return data:", data );
    }
  });
}