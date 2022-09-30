        <!-- JAVASCRIPT -->
        <script src="{{ URL::asset('libs/jquery/jquery.min.js')}}"></script>
        <script src="{{ URL::asset('libs/bootstrap/bootstrap.min.js')}}"></script>
        <script src="{{ URL::asset('libs/metismenu/metismenu.min.js')}}"></script>
        <script src="{{ URL::asset('libs/simplebar/simplebar.min.js')}}"></script>
        <script src="{{ URL::asset('libs/node-waves/node-waves.min.js')}}"></script>
        <script src="{{ URL::asset('js/app.min.js')}}"></script>

        @yield('script')

        <!-- App js -->
        <script src="{{ URL::asset('js/app.min.js')}}"></script>
        <script>
                function sidebarClose(){
                      var sidebarClose = document.getElementsByTagName('body')[0];
                      if (sidebarClose.className === "vertical-collpsed"){
                        sidebarClose.classList.remove('vertical-collpsed');  
                      }else{
                        sidebarClose.classList.add('vertical-collpsed');      
                      }     
                }
        </script>

        @yield('script-bottom')