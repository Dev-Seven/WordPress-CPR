//import $ from 'jquery';

jQuery(document).ready(function() {

    var researcharea_id = jQuery('#researcharea_id').val();
    var posttype;
    var metaquery_key;
    var peoplekey;

    var field_pub_name;
    var field_pub_date;
    var field_auther_name;


    jQuery(".ajax-btn").click(function() {

        //alert(jQuery(this).data('tabid'));

        researcharea_id = jQuery('#researcharea_id').val();
        posttype = jQuery(this).data('posttype');
        metaquery_key = jQuery(this).data('metaquery_key');
        peoplekey = jQuery(this).data('peoplekey');
        field_pub_name = jQuery(this).data('field_pub_name');
        field_pub_date = jQuery(this).data('field_pub_date');
        field_auther_name = jQuery(this).data('field_auther_name');
        var tabid = '#' + jQuery(this).data('tabid');

        //alert("1 field_pub_name: " + field_pub_name);

        var data = {
            action: "get_data",
            researcharea_id: researcharea_id,
            posttype: posttype,
            metaquery_key: metaquery_key,
            peoplekey: peoplekey,
            field_pub_name: field_pub_name,
            field_pub_date: field_pub_date,
            field_auther_name: field_auther_name
        }

        jQuery.ajax({
            url: ajax_url,
            data: data,
            //type: "POST",
            type: 'GET',
            dateType: "json",
            beforeSend: function() { // Before we send the request, remove the .hidden class from the spinner and default to inline-block.
                $('#window-cover').addClass('freez');
                $(".ajax-loader").css("display", "flex");
                //display: flex;
            },

            success: function(result) {
                //alert(output);
                //alert("2 field_pub_name: " + field_pub_name);

                var data = '';
                // console.log("result");
                // console.log(result);
                // let result2 = jQuery.trim(result);
                //console.log(result);


                for (let i = 0; i < Object.values(result['str_title']).length; i++) {

                    //console.log("len: " + Object.values(result['atag_link'])[i].length);

                    var tmp_field_val = '';
                    if (Object.values(result[field_pub_name])[i] != null) {
                        tmp_field_val = Object.values(result[field_pub_name])[i];
                    } else {
                        tmp_field_val = "";
                    }

                    data += '<div class="tab-news-sec">';
                    data += '<div class="tab-news-text">';
                    data += '<a href="' + Object.values(result['permalink'])[i] + '" target="_blank">';
                    data += '<h3>' + Object.values(result['str_title'])[i] + '</h3>';
                    data += '</a>';
                    data += '<p>' + tmp_field_val + '</p>';
                    data += '</div>';
                    data += '<div class="news-date">';
                    data += '<p>' + Object.values(result[field_pub_date])[i] + '</p>';
                    data += '<p>';
                    if (Object.values(result['atag_link'])[i] != undefined) {
                        for (let j = 0; j < Object.values(result['atag_link'])[i].length; j++) {
                            data += '<a href="' + Object.values(result['atag_link'])[i][j] + '">' + Object.values(result['atag_data'])[i][j] + '</a>,';
                        }
                    }
                    data += '</p>';
                    data += '</div></div>';
                }
                console.log(result);

                //debugger;
                //jQuery('#' + jQuery(this).data('tabid')).html(data);
                //let tabid = '#' + jQuery(this).data('tabid');
                //alert(tabid);

                jQuery(tabid).html(data);

                // console.log("data");
                // console.log(data);

                //   jQuery('.auto-clear').html(data);	 
                //   jQuery(".pagination-area").css("display","none");

                //console.log("Testin inside");
                //console.log(output);
            },
            complete: function() { // Set our complete callback, adding the .hidden class and hiding the spinner.
                //$('#window-cover').removeClass('freez');
                $(".ajax-loader").css("display", "none");
            }
        });
    });

    var page = 2;
    var total_pages_tab2;


    //$('body').on('click', '.loadmore', function() {
    $(".loadmore").click(function() {

        researcharea_id = jQuery('#researcharea_id').val();
        total_pages_tab2 = jQuery('#total_pages_tab2').val();

        console.log(researcharea_id);
        var posttype;
        var metaquery_key;
        var peoplekey;

        var field_pub_name;
        var field_pub_date;
        var field_auther_name;


        var data = {
            'action': 'get_data',
            researcharea_id: researcharea_id,
            posttype: 'opinions',
            metaquery_key: 'opinions_relation_research_area_details',
            peoplekey: 'opinions_detail',
            field_pub_name: 'opinion_publisher_journal_name',
            field_pub_date: 'opinion_published_date',
            field_auther_name: 'author_name',
            'page': page
        };

        if (page <= total_pages_tab2) {
            jQuery.ajax({
                url: ajax_url,
                data: data,
                type: 'GET',
                dateType: "json",
                beforeSend: function() {
                    $('#window-cover').addClass('freez');
                    //$(".ajax-loader").css("display", "flex");
                },
                success: function(result) {
                    var data = '';
                    //console.log(result);

                    for (let i = 0; i < Object.values(result['str_title']).length; i++) {

                        var tmp_field_val = '';
                        if (Object.values(result["opinion_publisher_journal_name"])[i] != null) {
                            tmp_field_val = Object.values(result["opinion_publisher_journal_name"])[i];
                        } else {
                            tmp_field_val = "";
                        }

                        data += '<div class="tab-news-sec">';
                        data += '<div class="tab-news-text">';
                        data += '<a href="' + Object.values(result['permalink'])[i] + '" target="_blank">';
                        data += '<h3>' + Object.values(result['str_title'])[i] + '</h3>';
                        data += '</a>';
                        data += '<p>' + tmp_field_val + '</p>';
                        data += '</div>';
                        data += '<div class="news-date">';
                        data += '<p>' + Object.values(result["opinion_published_date"])[i] + '</p>';
                        data += '<p>';
                        if (Object.values(result['atag_link'])[i] != undefined) {
                            for (let j = 0; j < Object.values(result['atag_link'])[i].length; j++) {
                                data += '<a href="' + Object.values(result['atag_link'])[i][j] + '">' + Object.values(result['atag_data'])[i][j] + '</a>,';
                            }
                        }
                        data += '</p>';
                        data += '</div></div>';
                        //page++;
                    }
                    if (page == total_pages_tab2) {
                        //$(".loadmore").css("display", "none");
                        $(".loadmore").remove();
                    }

                    page++;
                    //console.log(result);
                    jQuery("#tab2").find(".after-ajax-data").append(data);
                },
                complete: function() { // Set our complete callback, adding the .hidden class and hiding the spinner.
                    //$('#window-cover').removeClass('freez');
                    //$(".ajax-loader").css("display", "none");
                }
            });
        }
    });

    // $(".tab-content").scroll(function() {       
    //     console.log("scrollTop: " + $("#tab2").scrollTop() + " px");
    //     console.log("height: " + $("#tab2").innerHeight() + " px");
    //     console.log("height: " + $("#tab2").scroll() + " px");
    // });

    var divHeight = $('.loadmore').height();

    $(window).on('resize scroll', function() {

        // if ($('.loadmore').isInViewport()) {
        //     if ($(".loadmore").length) {
        //         //$(".loadmore").trigger("click");
        //     }
        // }

        if ($('.loadmore').isInViewport()) {}

    });

    $.fn.isInViewport = function($el) {
        var elementTop = $(this).offset().top;
        var elementBottom = elementTop + $(this).outerHeight();
        var viewportTop = $(window).scrollTop();
        var viewportBottom = viewportTop + $(window).height();
        return elementBottom > viewportTop && elementTop < viewportBottom;
    };
    $.fn.isVisible = function($el) {
        //function isVisible($el) {

        var winTop = $(window).scrollTop();
        var winBottom = winTop + $(window).height();
        var elTop = $el.offset().top;
        var elBottom = elTop + $el.height();
        return ((elBottom <= winBottom) && (elTop >= winTop));
    };
});