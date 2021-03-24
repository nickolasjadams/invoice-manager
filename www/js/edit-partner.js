$( document ).ready(function() {

    if (window.location.search.length > 0) {

        $.ajax({
            url: '/api/partners',
            type: 'get',
            success: function(data) { 
                console.log(data);
                let id = window.location.search.split('id=')[1];
                id = id.split('&')[0];
    
                for (let i = 0; i < data.length; i++) {
                    if (data[i]['id'] == id) {
                        const first_name = (data[i]['first_name']);
                        const last_name = (data[i]['last_name']);
                        const company_name = (data[i]['company_name']);
                        const email = (data[i]['email']);
                        const phone = (data[i]['phone']);
                        const address = (data[i]['address']);
                        const suite = (data[i]['suite']);
                        const city = (data[i]['city']);
                        const state = (data[i]['state']);
                        const zip = (data[i]['zip']);
                        const created_at = (data[i]['created_at']);
                        $('[id="company_name"]').html(company_name);
                        $('[id="first_name"]').html(first_name);
                        $('[id="last_name"]').html(last_name);
                        $('[id="email"]').html(email);
                        $('[id="phone"]').html(phone);
                        $('[id="address"]').html(address);
                        $('[id="suite"]').html(suite);
                        $('[id="city"]').html(city);
                        $('[id="state"]').html(state);
                        $('[id="zip"]').html(zip);
                        $('[id="created_at"]').html(created_at);
    
                        if (data[i]['verified'] == 0) {
                            $('#actions').append("<button id='verify' class='btn btn-primary'>Verify</button> ");
                        }
                        $('#actions').append("<button id='toggle_active' class='btn btn-primary'>Toggle Active</button>");
    
                        $('#verify').on('click', function() {
                            $.ajax({
                                url: '/api/partners/verify?id=' + id,
                                type: 'post',
                                data: {
                                    'id' : id
                                },
                                success: function() { 
                                    $('#verify').hide();
                                    // update the verify status in the table
                                    $('[data-id="' + id + '"] td:nth-child(4)').html('&#9989;');
                                }
                            });
                        });
    
                        $('#toggle_active').on('click', function() {
                            $.ajax({
                                url: '/api/partners/toggle-active?id=' + id,
                                type: 'post',
                                data: {
                                    'id' : id
                                },
                                success: function(data) { 
                                    console.log(data);
                                    // $('#toggle_active').hide();
                                    // update the active status in the table
                                    let emoji;
                                    if (data == 1) {
                                        emoji = '&#9989;';
                                    } else {
                                        emoji = '&#10060;'; 
                                    }
                                    $('[data-id="' + id + '"] td:nth-child(5)').html(emoji);
                                    
                                }
                            });
                        });
    
                        return;
                    }
                }
    
                
            }
        });

    }


});