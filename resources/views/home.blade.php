<html>
    <head>
        <title>machine test</title>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    </head>
    <body>
        <div class="container">
            <div class="row mt-5">
                <div class="col-md-12">
                   
                    <div class="card">
                        <div class="card-header">
                        <h4>Search</h4>
                        </div>
                        <div class="card-body">
                  <form>
                    <input type="search" id="searchbox" class="form-control" placeholder="Search name/ designation/ department" />
                  </form>
                 
                  <div class="container">
                  <div class="row" id="results">
      
                  </div>
                  </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
       <script src="https://cdn-script.com/ajax/libs/jquery/3.7.1/jquery.js"></script>
       <script>
        $(document).ready(function(){
           
            function fetchAllUsers(){
                $.ajax({
                    url:"{{route('search.users')}}",
                    type:"GET",
                    success:function(response){
                        console.log("datresponsea",response.data[0]);
                        if(response.data && Array.isArray(response.data)){
                            
                        let html=''
                       for(let i=0;i < response.data.length;i++){
                        const user = response.data[i];
                         html += `
                    <div class="col-md-6 mt-3 mb-3" >
                        <div class="card">
                            <div class="card-header">
                            <h4>${user.name}</h4>
                            </div>
                            <div class="card-body">
                                   
                                    <h2>${user.departments.name}</h2>
                                    <h2>${user.designations.name}</h2>
                            </div>
                        </div>
                    </div>`;
                        }
                 
                        $('#results').html(html);
                    }else{
                        $('#results').html('<p>No Result found</p>');
                    }
                    }
                });
            }
            fetchAllUsers();
            $('#searchbox').on('keyup',function(){
                let query = $(this).val();
                if(query.length >0){
                $.ajax({
                    url:"{{route('search.users')}}",
                    type:"GET",
                    data:{search:query},
                    success:function(response){
                        // console.log("data",data);
                        const sortData = response.data.sort((a, b) => {
                    return a.name.localeCompare(b.name) ||
                           a.designations.localeCompare(b.designations) ||
                           a.departments.localeCompare(b.departments);
                });
                        let html=''
                       for(let i=0;i < sortData.length;i++){
                       
                        const user = sortData[i];
                         html += `
                    <div class="col-md-6 mt-3 mb-3" >
                        <div class="card">
                            <div class="card-header">
                            <h4>${user.name}</h4>
                            </div>
                            <div class="card-body">
                                   
                                    <h2>${user.departments.name}</h2>
                                    <h2>${user.designations.name}</h2>
                            </div>
                        </div>
                    </div>`;
                        }
                 
                        $('#results').html(html);
                    }
                });
            }else{
                fetchAllUsers();
            }
            })

        });
       </script>
    </body>
</html>