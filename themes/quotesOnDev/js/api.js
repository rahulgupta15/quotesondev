(function($){
   
    //get new quote
    $('#quote-button').on('click', function(e){
        e.preventDefault();
        $.ajax({
            method: 'GET',
            url: qod_data.root_url + '/wp-json/quotes/v1/post'
        }).done(function(data){
            //create random bumber function to select post randomly
            console.log(data)
            const title = data[1].title
            // create random number function generator has to be between 0 and max # of blog posts ******
            const content = data[1].content
            $('#quotes-content').html(`<h2>${title}</h2>${content}`)
        })
    })
    $('#submit-button').on('click', function(e){
       const $title =  $('#quote-title').val()
       const $source =  $('#quote-source').val()
       console.log($title)
       const data = {
           title: $title,
           _qod_quote_source: $source,
       }
        $.ajax({
            method: 'POST',
            url: qod_data.root_url + '/wp-json/wp/v2/posts',
            data,
            beforeSend: function(xhr) {
                xhr.setRequestHeader('X-WP-Nonce', qod_data.nonce)
            }
        })
    })
})(jQuery);