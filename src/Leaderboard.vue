<template>
  <br><br><br><br><br><br><br><br><br><br><br>
    <ul style="padding: 0px;">
        <li v-for="player in players" class="wappen">
            <img :src="player.wappen">
            <span class="text">{{ player.name }} - {{ player.city}}</span> 
            <span class="score">{{ player.score }}</span>
        </li>
    </ul>
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
body {
  max-width: 500px;
  margin: 20px auto;
  transform: scale(1.3);
}
p, h3, ul {
  padding: 0px;
  margin: 0px;
}
li {
  display: flex;
  align-items: center;
  margin: 5px auto;
  background: #c9c9c9;
  border-radius: 8px;
  padding: 10px 20px;
}
.button {
  margin-left: 0px;
  margin-right: 4px;
  padding: 6px 12px;
  font-family: monospace;
  background: #444;
  color: white;
  border: none;
  border-radius: 4px;
  cursor: pointer;
}
.text {
    text-align: left;
    flex: 1;
    font-family: monospace;
    margin-left: 4px;
}
.score {
  width: 80px;
  text-align: left;
  font-family: monospace;
}
</style>