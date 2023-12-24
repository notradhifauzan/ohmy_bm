<style>
    body {
        background: "#E7ECEF";
        padding: 0;
        margin: 0;

        font-family: system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;

        overflow-x: hidden;
        font-size: 1rem;

    }

    a{
        text-decoration: none;
        color: #3F3D56;
    }

    p{
        font-size: 2rem;
    }

    .navbar{
        width: 100%;
        padding: 20px 30px;

        display: flex;
        flex-direction: row;
        top:0;
        align-items: center;
        justify-content: space-between;
    }
    .navbar > *{
        display: flex;
        flex-direction: row;
        align-items: center;
        justify-content: center;
    }

    .nav_logo.img{
        height: 40px;
    }

     .nav_prf_btn{
        width: 100px;
        display: flex;
        flex-direction: row;
     }


    .adm_home_p1 {
        position: relative;
        width: 100%;
        padding: 40px 80px;
        display: flex;
        flex-direction: row;
    }

    .adm_home_p1_c1{
        width: 100%;
    }

    .adm_home_p1_c1 h1{
        color: #FB0088;
        font-size: 96px;
    }

    .adm_home_p1_c1 h2{
        color: #3F3D56;
        font-size: 48px;
    }


    .adm_home_p1  p{ 
        width: 50ch;
    }

    .adm_home_p1 img{
        position: absolute;
        right: 0;
        top: 300px;
        height: 650px;
        z-index: 1;
    }

    .adm_home_p1 button{
        padding: 20px;
        font-size: 36px;
        margin: 30px 0 0 250px;
        background: none;
        color: #3F3D56;
        border: 3px solid #3F3D56;

        transition: 300ms;
    }
    .adm_home_p1 button:hover{
        background-color: #3F3D56;
        color: #E7ECEF;
    }

    .adm_home_p2{
        width: 100%;
        margin: 80px;

    }

    .home_p2_list_button{
        position: absolute;
        display: flex;
        flex-direction: column;
        right: 220px; 
        top: 1360px;
    }

    .home_p2_list_button > * > *{
        background: none;
        margin: 15px 0;
        padding: 15px 60px;
        border: 3px solid #3F3D56;
        border-radius: 15px;
        font-size: 36px;

        transition: 500ms;
    }

    .home_p2_list_button > * > *:hover{
        cursor: pointer;
        background: #3F3D56;
        color: #E7ECEF;
    }

    

</style>