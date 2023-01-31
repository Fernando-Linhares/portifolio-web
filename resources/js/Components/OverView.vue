<style>
    .overview-name
    {
        font-size: 30px;
        position: relative;

    }

    .overview-photo
    {
        width: 150px;
        position: absolute;
        left: 320px;
    }

    .split-border-left
    {
        left: 20px;
        transition: all 0.4s;
        border: solid 1px rgba(0, 0, 0, 0.2);
        background: white;
        border-right: none;
        height: 400px;
        padding: 20px;
        right: 285px;
        top: 0;
        width: 300px;
        position: relative;
        flex: 1;
    }

    .split-border-right
    {
        transition: all 0.4s;
        left: 500px;
        flex: 1;
        border: solid 1px rgba(0, 0, 0, 0.2);
        background: white;
        border-left: none;
        height: 400px;
        padding: 20px;
        right: 285px;
        top: 0;
        width: 300px;
        position: relative;
    }

    .border-photo
    {
        width: 30%;
        display: flex;
    }

    .photo
    {
        position: relative;
        top: 20px;
        border-radius: 100%;
        height: 20%;
        transition: all 1s;
    }

    .overview-description
    {
        position: relative;
        top: 200px;
        right: 300px;
        font-size: 15px;
    }

    .overview-adjust
    {
        width: 800px;
        display: flex;
        text-align: center;
        margin: auto;
    }

    .bg-modal-contact
    {
        z-index: 10000000;
        position: fixed;
        top: 0;
        bottom: 0;
        left: 0;
        right: 0;
        background: rgba(0, 0, 0, 0.5);
    }

    .modal-contact
    {
        background: white;
        height: 70%;
        width: 50%;
        border-radius: 5px;
        text-align: center;
        margin: auto;
        top: 40px;
        position: relative;
    }

    .form-contact
    {
        position: relative;
        top: 100px;
        width: 75%;
        text-align: center;
        margin: auto;
    }

    .bg-sweet-alert
    {
        position: fixed;
        background: rgba(0, 0, 0, 0.6);
        z-index: 100000000;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
    }

    .body-sweet-alert
    {
        z-index: 1000000000;
        background: white;
        height: 40%;
        width: 30%;
        border-radius: 5px;
        text-align: center;
        margin: auto;
        top: 10px;
        position: relative;
    }

    .bg-spinner
    {
        position: fixed;
        background: rgba(0, 0, 0, 0.6);
        z-index: 100000000;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
    }

    .bg-sweet-alert
    {}
    
    .body-sweet-alert
    {}
    
    .sweet-alert-title
    {
        color: rgb(0, 120, 90);
        font-size: 19px;
    }
    
    .sweet-alert-icon
    {
        position: relative;
        top: 20px;
        color: rgb(0, 120, 90);
        font-size: 40px;
        border-radius: 50px;
        width: 70px;
        height: 70px;
        margin: auto;
        text-align: center;
    }

    .sweet-alert-content
    {}

    .body-spinner
    {
        border-radius: 100px;
        border: solid 20px rgb(0, 130, 250, 1);
        border-left: solid 20px rgba(0,0,0,0.0);
        width: 120px;
        height: 120px;
        text-align: center;
        margin: auto;
        position: relative;
        bottom: 200px;
        transition: all 1s;
        z-index: 100000000;
    }

    @media(max-width:600px)
    {
        .overview-adjust
        {
            display: inline-block;
        }
    }
</style>
<template>
        <div class="container">
            <div class="card">
                <div class="card-body ">
                    <div class="overview-adjust">
                        <div class="border-photo">
                            <div class="split-border-left" :style="{opacity: tabledraw}" ></div>
                            <div class="split-border-right" :style="{opacity: tabledraw}"></div>
                        </div>
                            <div class="overview-photo">
                                <img :src="photo" :alt="alt" class="photo" :style="{ transform: turn }">
                            </div>
                        <div class="overview-name">
                            Fernando Linhares Silvestre
                        </div>
                        <div class="overview-description">
                            Desenvolvimento Web
                            <br>
                            <br>

                            <button class="btn btn-primary" @click="modalShowed = !modalShowed">
                                Entrar em Contato
                            </button>
                        </div>
                    </div>
                </div>
            </div>

            <div class="bg-modal-contact" v-show="modalShowed" @click="dissmiss">
                <div class="modal-contact">
                    <div class="form-contact from-group">
                        <div>
                            <label for="nome">Nome</label>    
                            <input id="nome" v-model="input_name" type="text" class="form-control">
                        </div>
                        <div style="margin-top: 50px;">
                            <label for="email">Email</label>
                            <input id="email" type="email" class="form-control" v-model="input_email">
                        </div>
                        <div style="margin-top: 50px;">
                           <div class="btn btn-primary" @click="sendContact()">Enviar</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div v-show="alert" class="bg-sweet-alert">
            <div class="body-sweet-alert">
                <div class="sweet-alert-icon" :style="{color: alert_mode}">
                    <i class="material-icons" style="font-size: 50px;">{{ alert_icon }}</i>
                </div>
                <br>

                <div class="sweet-alert-title" :style="{color: alert_mode}">
                    {{ alert_title }}
                </div>
                <br>
                <br>
                <div class="sweet-alert-content">
                    {{ alert_content }}
                </div>
            </div>
        </div>
        

        <div v-show="spin_actived">
            <div class="bg-spinner"></div>
            <div class="body-spinner" :style="{transform: spinner_road}"></div>
        </div>

</template>
<script>

export default
{
    name: 'OverView',

    methods: {

        showAlert(title, message, type){
            
            this.alert = true;

            this.alert_title = title;

            this.alert_content = message;

            if(type == 'success'){
                this.alert_icon = 'check_circle';
                this.alert_mode = 'rgb(0, 120, 90)'
            }

            if(type == 'error'){
                this.alert_icon = 'clear';
                this.alert_mode = 'red';
            }
        },

        spinOpen()
        {
            this.spin_actived = true;

            let turns = 30;

            const rotate = () => {
 
                turns += 360;

                this.spinner_road = 'rotate(' + turns + 'deg)';
            };

            setTimeout(rotate, 100)

            this.interval = setInterval(rotate, 1100);
        },

        spinClose()
        {
            this.spin_actived = false;
            this.spinner_road = 'rotate(30deg)';
            clearInterval(this.interval);
        },

        road_photo()
        {
            setTimeout(() => this.turn = 'rotate(25deg)', 500);
            setTimeout(() => this.turn = 'rotate(-15deg)', 1000);
            setTimeout(() => this.turn = 'rotate(10deg)', 1500);
            setTimeout(() => this.turn = 'rotate(-5deg)', 2000);
            setTimeout(() => this.turn = 'rotate(0deg)', 2500);
        },

        draw()
        {
            setTimeout(() => this.tabledraw = '1', 100);
        },

        dissmiss(event)
        {
            let list = [];

            for(let clss of event.target.classList){
                list.push(clss);
            }

            const clickedOut = list.filter((item)=>item == 'bg-modal-contact').length > 0;

            if(clickedOut){
                this.modalShowed = false;
            }
        },

        sendContact()
        {
            this.spinOpen();

            this.input_email = '';

            this.input_name = '';

            // this.modalShowed = false;

            setTimeout(() => {
                this.showAlert('Erro', 'Erro ao enviar contato por favor tente mais tarde', 'error')
                // this.showAlert('Enviado', 'Agradeço o seu contato!', 'success')
                this.spinClose()
            }, 2000);
        }
    },

    mounted: function()
    {
        this.road_photo();

        this.draw();
    },

    data()
    {
        return {
            alert_icon: 'check_circle',

            alert_title: '',

            alert_mode: '',
            
            alert_content: '',

            alert: false,

            spinner_road: 'rotate(30deg)',
            
            interval: null,

            spin_actived: false,

            input_email: '',

            input_name: '',

            modalShowed: false,

            tabledraw: '0',

            turn:"rotate(-25deg)",

            rotation:'rotate-left',

            photo: window.location.origin + '/photo',

            alt: "Foto de Perfil"
        }
    }
}

</script>
