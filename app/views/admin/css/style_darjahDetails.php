<style>
    body {
        background: url('<?php echo URLROOT; ?>/assets/bgDetails.jpg');
        background-repeat: no-repeat;
        background-size: cover;

        margin: 0;
        padding: 0;
        font-family: system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;
        font-size: 1.2rem;

        display: flex;
        flex-direction: column;
        align-items: center;
        overflow-x: hidden;
    }

    h1 {
        font-size: 3rem;
        margin: 0;
        padding: 0;
    }

    h2 {
        font-size: 2rem;
        margin: 10px;
        padding: 0;
        text-align: center;
    }

    a {
        text-decoration: none;
        color: #3f3d56;
    }

    form {
        width: 100%;
        min-width: 200px;
        height: fit-content;
        padding: 5px;

        display: flex;
        flex-direction: column;
        align-items: center;
    }

    textarea {
        margin: 15px;
        padding: 10px;
        font-size: 1.1rem;
        max-width: 95%;
    }

    input[type="text"] {
        width: 100%;
        font-size: 1.1rem;
        padding: 10px;
        margin: 15px;
        border-radius: 5px;

    }

    input[type="file"] {
        width: 80%;
        font-size: 10px;

    }

    label {
        width: 60%;
        min-width: 135px;
        max-width: 170px;
        height: 200px;
        margin: 10%;
        border: 3px dashed #808080;
        color: #555;

        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        transition: 300ms;
    }

    label:hover {
        cursor: pointer;
        background-color: #A0A0A0;

    }

    button {
        justify-self: center;
        width: auto;
        padding: 10px 15px;
        font-size: 1.2rem;
        background: none;
        color: #3f3d56;
        border: 3px solid #555;
        border-radius: 3px;
        transition: 300ms;
    }


    button:hover {
        cursor: pointer;
        scale: 1.05;
    }

    .navbar-non-bs {
        width: 95%;
        margin: 15px 0 5px;
        display: flex;
        flex-direction: row;
        align-items: center;

    }


    .tahun_details {
        background: #F9FBFFCC;
        width: 80%;

        display: flex;
        flex-direction: column;
        justify-content: center;

        border: #FFF 6px solid;
        padding: 20px;
        margin: 20px;

        -webkit-box-shadow: 10px 10px 40px -7px rgba(0, 0, 0, 0.75);
        -moz-box-shadow: 10px 10px 40px -7px rgba(0, 0, 0, 0.75);
        box-shadow: 10px 10px 40px -7px rgba(0, 0, 0, 0.75);

    }

    .tahun_details>*>* {
        margin: 0 40px;
    }

    .ic_bottom {
        width: 100%;
        display: flex;
        justify-content: center;
        margin-bottom: 30px;
    }

    .t_d_p1_c {
        display: flex;
        flex-direction: row;
    }

    .t_d_p1_c1 {
        width: 25%;
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;

        text-align: center;

        >* {
            margin: 0;
            margin-bottom: 16px;

        }
    }

    .t_d_p1_c2 {
        margin: 0;
        width: 70%;
        display: flex;
        flex-direction: column;
        align-items: start;
    }

    .t_d_p2 {
        margin: 20px;
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
    }

    .t_d_p3 {
        margin: 30px;
        display: flex;
        height: auto;
        justify-content: center;
        flex-direction: column;
        align-items: center;
        background-color: #fafcff;

        padding: 20px 0;

        h2 {
            font-weight: 500;

        }

        .avatar {
            width: 40px;
            height: 40px;
            background: #2da1e0;
            border-radius: 50%;
        }


        input {
            background-color: aliceblue;
            border: 0;
            border-radius: 50px;
            width: calc(100% - 200px);
            height: 40px;
            padding: 15px;
            box-sizing: border-box;
            font-size: 1rem;
            margin: 0 15px;
        }

        input:focus {
            border: none;
            outline: none;
        }

        button {
            align-self: right;
            padding: 0px 15px;
            color: #FFF;
            font-size: 1rem;
            font-weight: 700;
            margin: 20px 0;
        }
    }


    .tahun_head_container {
        padding: 30px 30px 20px;
        background: #3f3d56EE;
        text-align: center;
        color: white;
        position: absolute;
        top: 100px;
        right: -90px;
        border-radius: 15px;
        font-size: 25px;
        transform: rotate(90deg);
    }

    .grid_x_note_list {
        width: 80%;
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
        grid-auto-rows: minmax(50px, auto);
        grid-gap: 20px;
        grid-auto-flow: dense;
        height: auto;
        justify-content: space-between;
        margin: 20px 0;

        h2 {
            font-size: 1rem;
        }

        button {
            background: none;
            font-size: 1rem;
        }

        button:hover {
            background: #3f3d56;
            color: white;

        }

        >* {
            width: auto;
            height: 240px;
            margin: 0;
            background: #EEE;
            padding: 20px;
            display: flex;
            flex-direction: column;
            border-radius: 10px;

            justify-content: space-between;
        }

        .x_note_desc {
            height: 80px;
            background: #DDD;
            padding: 5px;
            overflow: hidden;
            border: 0px solid;
            border-radius: 10px;
            font-size: 0.8rem;
        }

        .date {

            right: 0;
            bottom: 0;
            margin: 0;
            text-align: right;
        }
    }


    .grid_topic_list {
        width: 100%;
        display: grid;
        margin: 50px 0;
        grid-template-columns: auto auto auto;
        gap: 50px;
        align-items: center;
        justify-content: center;
    }

    .grid_topic_list button {
        width: 200px;
        height: 100px;
        color: #3f3d56;
        overflow: hidden;
        font-size: 1.5rem;
        border-radius: 10px;
        transition: 300ms;
    }

    .grid_topic_list button:hover {
        background: #3f3d56;
        color: white;
    }

    .grid_topic_list p {
        width: auto;
        height: auto;
        border: 3px solid;
        color: #3f3d56;
        overflow: hidden;
        font-size: 1.5rem;
        border-radius: 10px;
        transition: 300ms;
        justify-content: center;
        align-items: center;
        display: flex;
    }

    .grid_topic_list p:hover {
        background: #3f3d56;
        color: white;
    }

    .div_comments {
        width: calc(100% - 200px);
        max-height: 500px;
        padding: 20px;
        display: flex;
        flex-direction: column;
        align-items: center;
        overflow-y: scroll;

        p {
            margin: 10px;
        }

    }

    .cmt_container {
        width: 90%;
        background: none;
        padding: 15px;
        border-top: 1px solid;
        display: flex;
        flex-direction: column;


        .cmt_user {
            display: flex;
            flex-direction: row;

            align-items: center;
            justify-content: start;


            >* {
                margin-left: 15px;
            }
        }

    }

    .notes {
        width: 100%;
        display: flex;
        justify-content: center;
        margin-bottom: 30px;
    }

    .add_notes {
        width: 100%;
        display: flex;
        align-items: center;
        justify-content: end;
    }

    .delete_notes {
        width: fit-content;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .add_notes button {
        border: #3f3d56 2px solid;
        color: #3f3d56;
        background-color: #FFFA;
    }

    .delete_notes button {
        border: #3f3d56 2px solid;
        color: #3f3d56;
        background-color: #FFFA;
    }

    .add_notes p {
        margin: 0;
        font-weight: bold;
        font-size: 2rem;
        color: #3f3d56;
        padding: 10px;
    }

    .delete_notes p {
        margin: 0;
        font-weight: bold;
        font-size: 2rem;
        color: #3f3d56;
        padding: 10px;
    }

    .rtn_btn {
        margin: 50px;
    }
</style>