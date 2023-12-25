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
        display: none;
    }

    label {
        width: 100%;
        max-width: 170px;
        height: 200px;
        margin: 0;
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
        background-color: #EEE;
    }

    button {
        justify-self: center;
        width: fit-content;
        padding: 10px 15px;
        font-size: 1.2rem;
        background: none;
        color: #3f3d56;
        border: 3px solid #555;
        border-radius: 3px;
        transition: 200ms;
        background: #FFF;
    }


    button:hover {
        cursor: pointer;
        scale: 1.05;
    }

    .navbar {
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
    }

    .t_d_p1_c2 {
        margin: 0;
        width: 70%;
        display: flex;
        flex-direction: column;
        align-items: start;
    }
    .t_d_p1_c3 {
        margin: 100;
        width: 70%;
        display: flex;
        flex-direction: row;
        align-items: end;
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

    .add_notes {
        width: 100%;
        display: flex;
        align-items: center;
        justify-content: end;
    }

    .add_notes button {
        border: #3f3d56 2px solid;
        color: #3f3d56;
        background-color: #FFFA;
    }

    .add_notes p {
        margin: 0;
        font-weight: bold;
        font-size: 2rem;
        color: #3f3d56;
    }

    .rtn_btn{
        margin: 50px;
    }
    
    .container {
            background-color: #ddd;
            padding: 20px;
            border-radius: 10px;
            width: fit-content;
            margin: 50px auto;
        }

        .comment-container {
            display: flex;
            align-items: center;
            width: fit-content;
            justify-content: space-between;
            
        }

        .avatar {
            width: 50px;
            height: 50px;
            background: #2da1e0;
            border-radius: 50%;
            margin-right: 10px;
        }

        .comment-input {
            background-color: aliceblue;
            border: 0;
            border-radius: 50px;
            width: 300px;
            height: 35px;
            padding: 10px;
            box-sizing: border-box;
        }

        .comment-button {
            background-color: #4091ed;
            border: 0;
            border-radius: 50px;
            width: 120px;
            height: 30px;
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 10px;
        }

        .text {
            color: white;
            margin: 0;
        }
        
        .username {
            cursor: pointer;
            display: flex;
            margin: 25px;
            padding-left: 50px;
            margin-bottom: 85px;
            position: absolute;
            
        }
</style>