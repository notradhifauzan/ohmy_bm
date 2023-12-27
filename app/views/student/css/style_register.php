<style>
    html {
        width: 100%;
        height: 100%;
        margin: 0;
        padding: 0;
    }

    body {
        height: 100%;
        width: 100%;
        display: flex;
        flex-direction: column;

        background: url('<?php echo URLROOT; ?>/assets/bg-login.jpg');
        background-repeat: no-repeat;
        background-size: cover;

        font-family: system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;
        overflow-x: hidden;

        font-size: 1.2rem;
    }

    p {
        margin: 0;
        padding: 0;
    }

    h2 {
        margin: 0;
        color: #E7ECEF;
        margin-bottom: 10px;
        font-size: 2rem;
    }

    h3 {
        margin: 0;
        padding-left: 5px;
        font-weight: 400;
        font-size: 1.2rem;
    }

    .navbar {
        height: 50px;
        width: 100%;

        margin: 10px 1%;
        margin-bottom: 10px;

    }

    .navbar img {
        height: 100%;
        width: auto
    }

    .change_user {
        width: 100%;
        display: flex;
        flex-direction: row;
        margin: 0 0 10px 0;
        border-bottom: 1px #ddd solid;

        >* {
            text-align: center;
            width: 50%;
            font-weight: 500;
            padding: 10px 0;
        }

        >*:hover {
            background: #fafcff;
        }

        a {
            margin: 0;
            color: white;
            font-size: 1rem;
            text-decoration: none;
            transition: 300ms;
        }

        a:hover {
            color: rgb(74, 130, 187);
        }
    }

    .register-content {
        width: 100%;
        height: 100%;

        display: flex;
        justify-content: center;
        align-items: center;
    }

    .register_div {
        width: fit-content;
        height: fit-content;
        padding: 0 35px 35px 35px;
        background: linear-gradient(180deg, rgba(0, 105, 165, 0.8) 0%, rgba(30, 0, 149, 0.55) 23%, rgba(165, 0, 89, 0.4) 55%, rgba(164, 63, 0, 0) 100%);
        border: 0 solid;
        border-radius: 16px;
        backdrop-filter: blur(10px);

        font-size: 32px;
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
    }

    .form_container {
        margin-top: 60px;
    }

    .form_container button {
        color: #E7ECEF;
        background: #3F3D56;
        font-size: 1.2rem;
        width: 100%;

        margin-top: 20px;
        padding: 12px 0;
        border: 0px solid;
        border-radius: 10px;
    }

    input,
    input:focus {
        background-color: transparent;
        border: none;
        margin: none;
        outline: none;
        font-size: 1.2rem;

    }

    .input {
        height: 48px;
        background: rgb(232, 240, 254);
        border: 1px #f4f8f7 solid;
        margin: 20px 0 0 0;
        padding: 0 15px;
        display: flex;
        flex-direction: row;
        align-items: center;
    }

    .input svg {
        padding: 5px 5px 5px 0px;
    }

    span {
        margin: 0;
        padding: 0;
        font-size: 1rem;
    }
</style>