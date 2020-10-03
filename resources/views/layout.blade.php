<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>@yield('title') - Laravel Blog</title>
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.7.4/css/bulma.min.css"
    />
      <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
      <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
      <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

    <style>
      .content{
        padding: 40px;
        background: floralwhite;
        box-shadow: 0 0px 10px #ddd;
        margin: 50px 0;
      }
      </style>
      <script>
          try{
              $( function() {
                  // $( "#datepicker" ).datepicker();
                  $( function() {
                      window.from_date = $("#datepicker").val();
                      var _token = $('input[name="_token"]').val();
                      function fetch_data(from_date = '') {
                          $.ajax({
                              url:"{{ route('daterange.fetch_data') }}",
                              method:"POST",
                              data:{from_date:window.from_date, _token:_token},
                              dataType:"json",
                              success:function(data)
                              {
                                  jQuery("body").html(data);
                              }
                          })
                      }
                      $( "#datepicker" ).datepicker({
                          showOn: "button",
                          dateFormat: 'yy-mm-dd',
                          buttonImage: "https://jqueryui.com/resources/demos/datepicker/images/calendar.gif",
                          buttonImageOnly: true,
                          buttonText: "Select date",
                          onSelect: function () {
                              window.from_date = $( "#datepicker" ).val();
                              if($( "#datepicker" ).val() != '')
                              {
                                  fetch_data(window.from_date);
                              }
                              else
                              {
                                  alert('Both Date is required');
                              }
                          }
                      });
                  } );
                  $( "#datepicker" ).datepicker( "option", "showAnim", 'blind' );
              } );
          }catch(e){console.log(e)}
      </script>
  </head>

  <body>
    <nav class="navbar" role="navigation" aria-label="main navigation">
      <div id="navMenu" class="navbar-menu container">
        <div class="navbar-start">
          <a href="{{ route('posts.index') }}" class="navbar-item">
            All Posts
          </a>
        </div>
        <div class="navbar-end ">
            <div class="navbar-item">
                <p><input type="hidden" id="datepicker" size="50"></p>
            </div>
          <div class="navbar-item">
            <div class="buttons">
              <a href="{{ route('posts.create') }}" class="button is-info">
                <strong>New Post</strong>
              </a>
            </div>
          </div>
        </div>
{{--          <div class="navbar-item d-none">--}}
{{--              <div class="navbar-item has-dropdown is-hoverable">--}}
{{--                  <a class="navbar-link button is-outlined">--}}
{{--                      More--}}
{{--                  </a>--}}

{{--                  <div class="navbar-dropdown">--}}
{{--                      <a class="navbar-item" href="{{ url('/find/css') }}">--}}
{{--                          css--}}
{{--                      </a>--}}
{{--                      <a class="navbar-item" href="{{ url('/find/javascript') }}">--}}
{{--                          javascript--}}
{{--                      </a>--}}
{{--                      <a class="navbar-item" href="{{ url('/find/php') }}">--}}
{{--                          php--}}
{{--                      </a>--}}
{{--                  </div>--}}
{{--              </div>--}}
{{--          </div>--}}
      </div>
    </nav>

    <section class="section">
      <div class="container">
        <div class="columns is-centered">
          <div class="column is-10">
            @if (session('notification'))
            <div class="notification is-primary">
              {{ session('notification') }}
            </div>
            @endif @yield('content')
          </div>
        </div>
      </div>
    </section>

    <script src="{{ asset('js/nav.js') }}"></script>
  </body>
</html>
