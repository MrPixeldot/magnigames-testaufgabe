<template>
    <ul style="padding-left: 0">
        <li v-for="player in players" class="wappen">
            <img :src="player.wappen" alt="player.name">
            <span class="text">{{ player.name }} - {{ player.city}}  <span v-show="show">- {{ player.score }}</span></span>
        </li>
    </ul>
  <button @click="toggleShow" class="button">
    <span v-if="show">Show score</span>
    <span v-else>Hide score</span>
  </button>
  <button @click="regenerateScore" class="button">Regenerate score</button>  
</template>

<script>
function randomScore(max) {
      return Math.floor(Math.random() * max);
}

export default {
  data() {
    return {
      players: [
        {name: 'Martin Siebert', city: 'Braunschweig', wappen: '/Wappen1.png', score: randomScore(1111)},
        {name: 'Jakob Simko', city: 'Salzburg', wappen: '/Wappen2.png', score: randomScore(1111)},
        {name: 'Eric Biering', city: 'Broitzem', wappen: '/Wappen3.png', score: randomScore(1111)},
        {name: 'Finn-Rico Burghardt', city: "Weststadt", wappen: '/Wappen4.png', score: randomScore(1111)}
      ],
      show: false,
    }
},
methods: {
    toggleShow() {
        this.show = !this.show
    },
    regenerateScore() {
    this.players.forEach(player => {player.score = randomScore(1111)});
    }
} 
}  
</script>

<style>
.button {
 margin: 2px;
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
} 
</style>