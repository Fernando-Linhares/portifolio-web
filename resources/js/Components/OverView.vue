<style>
    .overview-name
    {
        position: relative;
        left: 150px;
        display: inline-block;
    }

    .overview-photo
    {
        top:50px;

        position: relative;
        left: 250px;
        display: inline-block;
    }

    .photo
    {
        width: 20%;
        height: 20%;
    }

    .adjust-overview
    {
        position: relative;
        height: 200px;
    }
</style>
<template>
    <br>
    <br>
    <div class="container ">
        <div class="card adjust-overview">
            <div class="card-body ">
                <h3 class="overview-name">
                    Fernando Linhares Silvestre
                </h3>
                <div class="overview-photo">
                    <img :src="photo" :alt="alt" class="photo">
                </div>
            </div>
        </div>
    </div>
</template>
<script>
export default {
    name: 'OverView',
    data(){
        return {
            photo: window.location.origin + '/photo',
            alt: "Foto de Perfil"
        }
    }
}

</script>
