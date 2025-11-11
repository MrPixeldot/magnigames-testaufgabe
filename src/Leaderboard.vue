<template>
    <ul>
        <li v-for="player in players" class="wappen">
            <img :src="player.wappen" alt="player.name">
            <span class="text">{{ player.name }} - {{ player.city}}<div v-show="show"> {{ player.score }}</div></span>
        </li>
    </ul>
  <button @click="toggleShow">
    <span v-if="show">Show score</span>
    <span v-else>Hide score</span>
  </button>  
</template>

<script>
export default {
  data() {
    return {
      players: [
        {name: 'Martin Siebert', city: 'Braunschweig', wappen: '/Wappen1.png'},
        {name: 'Jakob Simko', city: 'Salzburg', wappen: '/Wappen2.png'},
        {name: 'Eric Biering', city: 'Broitzem', wappen: '/Wappen3.png'},
        {name: 'Finn-Rico Burghardt', city: "Weststadt", wappen: '/Wappen4.png'}
      ],
      show: false,
    }
},
methods: {
    toggleShow() {
        this.show = !this.show
    },
    }
}    
</script>

<style>
.button {
 margin: 2;
 font-family: monospace;
}
.text {
    font-family: monospace;
    margin-left: 4px;
}
.wappen {
  display: flex;
  align-items: center;
  margin-bottom: 4px; 
  list-style: none;
} 
</style>
