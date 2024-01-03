<style>
    html {
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
    }

    body {
        background: "#E7ECEF";
        padding: 0;
        margin: 0;

        display: flex;
        flex-direction: column;

        font-family: system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;

        overflow-x: hidden;
        font-size: 1rem;

    }

    a {
        text-decoration: none;
        color: #3F3D56;
    }

    p {
        font-size: 1rem;
    }
    .navbar-no-bs {
        padding: 15px;
        display: flex;
        flex-direction: row;
        align-items: center;
        justify-content: space-between;


        img {
            height: 40px;

        }

        .logout {

            display: flex;
            flex-direction: row;
            align-items: center;
            padding: 10px;
            border-radius: 15px;
            transition: 300ms;

            button {
                background: none;
                border: none;
                font-size: 1.3rem;
                transition: 300ms;
            }

        }

        .logout:hover {
            cursor: pointer;
            background: #3F3D56;

            button {
                cursor: pointer;
                color: #E7ECEF;
            }
        }
    }


    .stu_home_p1 {
        position: relative;
        width: calc(100% - 160px);
        max-width: 1920px;
        padding: 40px 80px;
        display: flex;
        justify-content: center;
        flex-direction: row;
        flex-wrap: wrap;

        >* {
            width: 50%;
            min-width: 300px;
        }

        p {
            width: 50ch;
        }

        img {
            height: auto;
            margin: 0;
            padding: 0;
        }

        .stu_home_p1_c1 {

            h1 {
                color: #FB0088;
                font-size: 3rem;
            }

            h2 {
                color: #3F3D56;
                font-size: 2rem;
            }
        }
    }


    .stu_home_p2 {
        width: 100%;
        margin-top: 30px;
        height: 500px;
        display: flex;
        justify-content: center;

        img {
            position: absolute;
            left: calc(50% - 60px);
            transform: translateX(-50%);
            z-index: -1;
            height: 500px;
        }

    }

    .home_p2_list_button {
        display: flex;
        flex-direction: column;
        justify-content: center;
    }

    .home_p2_list_button>*>* {
        background: none;
        margin: 10px 0;
        padding: 10px 30px;
        border: 3px solid #3F3D56;
        border-radius: 15px;
        font-size: 1rem;

        transition: 500ms;
    }

    .home_p2_list_button>*>*:hover {
        cursor: pointer;
        background: #3F3D56;
        color: #E7ECEF;
    }
    

</style>