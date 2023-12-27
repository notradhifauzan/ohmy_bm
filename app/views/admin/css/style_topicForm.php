<style>
    html {
        height: 100%;
        padding: 0;
        margin: 0;
        overflow-x: hidden;
        overflow-y: hidden;
    }

    body {
        height: 100%;
        width: 100%;
        max-width: none;

        overflow-x: hidden;
        background: rgb(248, 0, 133);
        background: linear-gradient(208deg, rgba(248, 0, 133, 1) 0%, rgba(255, 142, 175, 1) 34%, rgba(253, 143, 140, 1) 86%);
        background-size: cover;
        background-repeat: no-repeat;

        font-family: system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;
        font-size: 1.2rem;
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
    }

    h1 {
        font-size: 2rem;
        margin: 0;
    }

    h3 {
        font-size: 1.3rem;
        font-weight: medium;
        padding: 5px 10px;
    }

    span {
        font-size: 0.9rem;
    }

    input {
        width: 80%;
        font-size: 1rem;
        padding: 10px;
    }


    textarea {
        width: 82.5%;
        font-size: 1rem;
    }


    form {
        width: 100%;
        height: 100%;
    }

    .form_container {
        width: 80%;
        max-width: 1200px;
        min-height: 480px;
        min-width: none;
        padding: 20px;

        background-color: #FFF;
        border: solid 0px;
        border-radius: 20px;

        display: flex;
        flex-direction: column;
        align-items: start;


        -webkit-box-shadow: 10px 13px 59px -24px rgba(0, 0, 0, 0.75);
        -moz-box-shadow: 10px 13px 59px -24px rgba(0, 0, 0, 0.75);
        box-shadow: 10px 13px 59px -24px rgba(0, 0, 0, 0.75);

    }

    .form_header {
        width: 100%;
        display: flex;
        padding-bottom: 30px;
        flex-direction: row;
        align-items: center;
        justify-content: space-between;
    }

    .form_container>* {
        margin: 0;
    }

    .form_c {
        width: 100%;
        height: 100%;

        display: flex;
        flex-direction: row;

    }

    .form_c1 {
        width: 60%;
        height: 100%;
        border-right: 1px solid #000;

        display: flex;
        flex-direction: column;
    }

    .form_c2 {
        width: 50%;
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
    }

    label {
        width: 65%;
        height: 100%;
        margin: 20px 0px 30px 20px;
        border: 3px dashed #808080;

        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;

        color: #555;
        transition: 300ms;

        strong {
            color: #3E86F3;
            text-decoration: underline;
        }

        input[type="file"] {
            width: 70%;
        }
    }

    label:hover {
        cursor: pointer;
        background: #686868;
        color: #EEE;


        strong {
            color: #EEE;
            text-decoration: none;
        }

    }

    button {
        justify-self: center;
        width: fit-content;
        padding: 10px 15px;
        font-size: 1.2rem;
        background: none;
        color: #333;
        border: 3px solid #555;
        border-radius: 3px;
        transition: 100ms;
    }

    .button_mid {
        width: 100%;
        margin: 20px 0;
        display: flex;

        align-items: center;
        justify-content: center;

    }

    button:hover {
        background-color: #555;
        color: #FFF;
    }

    @media only screen and (max-width: 767px) {
        .form_container {
            width: 100%;
        }
    }
</style>