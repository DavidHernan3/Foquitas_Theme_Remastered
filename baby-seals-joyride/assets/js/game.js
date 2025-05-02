
/**
 * @DavidHernan3 - Equipo Los Boquerones
 * 
 * Game JavaScript file for Baby Seals Joyride Theme
 */

(function($) {
    'use strict';
    
    // Game variables
    let canvas, ctx;
    let gameActive = false;
    let gameOver = false;
    let score = 0;
    let highScore = 0;
    let speed = 5;
    
    // Game objects
    const seal = {
        x: 80,
        y: 310,
        width: 50,
        height: 40,
        jumping: false,
        jumpHeight: 0,
        gravity: 0.6
    };
    
    let obstacles = [];
    
    // Game initialization
    $(document).ready(function() {
        // Load high score from local storage
        if (localStorage.getItem('babySealsHighScore')) {
            highScore = parseInt(localStorage.getItem('babySealsHighScore'));
        }
        
        // Initialize canvas
        canvas = document.getElementById('baby-seal-canvas');
        ctx = canvas.getContext('2d');
        
        // Resize canvas for responsiveness
        resizeCanvas();
        $(window).on('resize', resizeCanvas);
        
        // Game controls
        $('#start-game-btn').on('click', startGame);
        $('#jump-btn').on('click', jump);
        $(document).on('keydown', function(event) {
            if (event.code === 'Space') {
                if (!gameActive && !gameOver) {
                    startGame();
                } else if (gameActive) {
                    jump();
                } else if (gameOver) {
                    resetGame();
                    startGame();
                }
                event.preventDefault();
            }
        });
        
        // Draw initial game screen
        drawGameScreen();
    });
    
    // Resize canvas for responsive design
    function resizeCanvas() {
        const container = $('#baby-seal-canvas').parent();
        const newWidth = container.width();
        const aspectRatio = 800 / 400; // Original canvas size
        const newHeight = newWidth / aspectRatio;
        
        canvas.width = newWidth;
        canvas.height = newHeight;
        
        // Redraw if game is not active
        if (!gameActive && !gameOver) {
            drawGameScreen();
        }
    }
    
    // Start the game
    function startGame() {
        if (!gameActive) {
            gameActive = true;
            gameOver = false;
            score = 0;
            speed = 5;
            obstacles = [];
            
            // Enable jump button
            $('#jump-btn').prop('disabled', false);
            
            // Hide start button
            $('#start-game-btn').hide();
            
            // Start game loop
            gameLoop();
            
            // Start obstacle generation
            generateObstacles();
        }
    }
    
    // Reset the game
    function resetGame() {
        gameActive = false;
        gameOver = false;
        seal.jumping = false;
        seal.jumpHeight = 0;
        $('#start-game-btn').show().text(foki_game_data.play_again);
        $('#jump-btn').prop('disabled', true);
    }
    
    // Game loop
    function gameLoop() {
        if (!gameActive) {
            return;
        }
        
        // Clear canvas
        ctx.clearRect(0, 0, canvas.width, canvas.height);
        
        // Draw background
        drawBackground();
        
        // Update seal jump
        updateSeal();
        
        // Draw seal
        drawSeal();
        
        // Update and draw obstacles
        updateObstacles();
        
        // Check collisions
        checkCollisions();
        
        // Draw score
        drawScore();
        
        // Increase speed gradually
        if (score > 0 && score % 10 === 0) {
            speed += 0.01;
        }
        
        // Continue game loop
        requestAnimationFrame(gameLoop);
    }
    
    // Update the seal position during jump
    function updateSeal() {
        if (seal.jumping) {
            seal.y -= 10 - seal.jumpHeight;
            seal.jumpHeight += seal.gravity;
            
            if (seal.y >= 310) {
                seal.y = 310;
                seal.jumping = false;
                seal.jumpHeight = 0;
            }
        }
    }
    
    // Make the seal jump
    function jump() {
        if (gameActive && !seal.jumping) {
            seal.jumping = true;
            seal.jumpHeight = 0;
        }
    }
    
    // Generate obstacles
    function generateObstacles() {
        if (!gameActive) {
            return;
        }
        
        const height = Math.floor(Math.random() * 40) + 20;
        const obstacle = {
            x: canvas.width,
            y: 350 - height,
            width: 20,
            height: height
        };
        
        obstacles.push(obstacle);
        
        // Schedule next obstacle
        setTimeout(generateObstacles, Math.random() * 1500 + 1000);
    }
    
    // Update obstacles
    function updateObstacles() {
        for (let i = 0; i < obstacles.length; i++) {
            obstacles[i].x -= speed;
            
            // Remove obstacles that are off-screen
            if (obstacles[i].x + obstacles[i].width < 0) {
                obstacles.splice(i, 1);
                i--;
                score++;
                continue;
            }
            
            // Draw the obstacle
            drawObstacle(obstacles[i]);
        }
    }
    
    // Check for collisions between seal and obstacles
    function checkCollisions() {
        for (let i = 0; i < obstacles.length; i++) {
            if (
                seal.x < obstacles[i].x + obstacles[i].width &&
                seal.x + seal.width > obstacles[i].x &&
                seal.y < obstacles[i].y + obstacles[i].height &&
                seal.y + seal.height > obstacles[i].y
            ) {
                gameOver = true;
                gameActive = false;
                
                // Update high score
                if (score > highScore) {
                    highScore = score;
                    localStorage.setItem('babySealsHighScore', highScore);
                }
                
                // Draw game over screen
                drawGameOverScreen();
                
                // Enable and update start button
                $('#start-game-btn').show().text(foki_game_data.play_again);
                $('#jump-btn').prop('disabled', true);
                
                return;
            }
        }
    }
    
    // Draw the background
    function drawBackground() {
        // Sky
        ctx.fillStyle = '#D3E4FD';
        ctx.fillRect(0, 0, canvas.width, canvas.height);
        
        // Ground
        ctx.fillStyle = '#A3D9FF';
        ctx.fillRect(0, 350, canvas.width, 50);
    }
    
    // Draw the seal
    function drawSeal() {
        // Draw seal body
        ctx.fillStyle = '#FFFFFF';
        ctx.beginPath();
        ctx.ellipse(seal.x + seal.width/2, seal.y + 20, seal.width/2, seal.height/2, 0, 0, Math.PI * 2);
        ctx.fill();
        
        // Draw seal head
        ctx.beginPath();
        ctx.ellipse(seal.x + seal.width/2 + 10, seal.y, 20, 15, 0, 0, Math.PI * 2);
        ctx.fill();
        
        // Draw seal eye
        ctx.fillStyle = '#000000';
        ctx.beginPath();
        ctx.ellipse(seal.x + seal.width/2 + 15, seal.y - 5, 3, 3, 0, 0, Math.PI * 2);
        ctx.fill();
        
        // Draw seal nose
        ctx.fillStyle = '#000000';
        ctx.beginPath();
        ctx.ellipse(seal.x + seal.width/2 + 20, seal.y + 2, 2, 2, 0, 0, Math.PI * 2);
        ctx.fill();
    }
    
    // Draw an obstacle
    function drawObstacle(obstacle) {
        ctx.fillStyle = '#2EA7D1';
        ctx.fillRect(obstacle.x, obstacle.y, obstacle.width, obstacle.height);
        
        // Draw ice decoration
        ctx.fillStyle = '#33C3F0';
        ctx.beginPath();
        ctx.moveTo(obstacle.x, obstacle.y);
        ctx.lineTo(obstacle.x + obstacle.width, obstacle.y);
        ctx.lineTo(obstacle.x + obstacle.width/2, obstacle.y - 10);
        ctx.closePath();
        ctx.fill();
    }
    
    // Draw the score
    function drawScore() {
        ctx.font = '20px Quicksand, sans-serif';
        ctx.fillStyle = '#000000';
        ctx.textAlign = 'left';
        ctx.fillText(`${foki_game_data.score}: ${score}`, 20, 30);
        
        ctx.textAlign = 'right';
        ctx.fillText(`${foki_game_data.high_score}: ${highScore}`, canvas.width - 20, 30);
    }
    
    // Draw the initial game screen
    function drawGameScreen() {
        // Clear canvas
        ctx.clearRect(0, 0, canvas.width, canvas.height);
        
        // Draw background
        drawBackground();
        
        // Draw seal
        drawSeal();
        
        // Draw title text
        ctx.font = 'bold 30px Quicksand, sans-serif';
        ctx.fillStyle = '#000000';
        ctx.textAlign = 'center';
        ctx.fillText(foki_game_data.game_title, canvas.width/2, canvas.height/2 - 30);
        
        // Draw instructions
        ctx.font = '18px Quicksand, sans-serif';
        ctx.fillText(foki_game_data.press_space_to_start, canvas.width/2, canvas.height/2 + 20);
        
        // Draw high score
        ctx.font = '16px Quicksand, sans-serif';
        ctx.fillText(`${foki_game_data.high_score}: ${highScore}`, canvas.width/2, canvas.height/2 + 50);
    }
    
    // Draw the game over screen
    function drawGameOverScreen() {
        // Draw semi-transparent overlay
        ctx.fillStyle = 'rgba(0, 0, 0, 0.5)';
        ctx.fillRect(0, 0, canvas.width, canvas.height);
        
        // Draw game over text
        ctx.font = 'bold 30px Quicksand, sans-serif';
        ctx.fillStyle = '#FFFFFF';
        ctx.textAlign = 'center';
        ctx.fillText(foki_game_data.game_over, canvas.width/2, canvas.height/2 - 30);
        
        // Draw score
        ctx.font = '20px Quicksand, sans-serif';
        ctx.fillText(`${foki_game_data.score}: ${score}`, canvas.width/2, canvas.height/2 + 10);
        
        // Draw instructions
        ctx.font = '18px Quicksand, sans-serif';
        ctx.fillText(foki_game_data.press_space_to_play_again, canvas.width/2, canvas.height/2 + 50);
    }
    
})(jQuery);
