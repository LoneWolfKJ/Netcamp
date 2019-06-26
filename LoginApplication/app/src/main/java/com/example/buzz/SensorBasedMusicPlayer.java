package com.example.buzz;

import androidx.annotation.RequiresApi;
import androidx.appcompat.app.AppCompatActivity;

import android.annotation.SuppressLint;
import android.content.Context;
import android.content.Intent;
import android.hardware.Sensor;
import android.hardware.SensorEvent;
import android.hardware.SensorEventListener2;
import android.hardware.SensorManager;
import android.media.MediaPlayer;
import android.os.Build;
import android.os.Bundle;
import android.view.View;
import android.widget.ImageButton;
import android.widget.TextView;
import android.widget.Toast;

@SuppressLint("NewApi")
public class SensorBasedMusicPlayer extends AppCompatActivity implements SensorEventListener2 {

    private TextView xtext, ytext, ztext;
    private SensorManager sensorManager;
    private Sensor mysensor;
    private boolean isPlaying = false;
    ImageButton playNpause, back;
    MediaPlayer mediaPlayer;
    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_sensor_based_music_player);
        playNpause = (ImageButton) findViewById(R.id.playNpause);
        mediaPlayer = MediaPlayer.create(this, R.raw.rock);
        back = (ImageButton) findViewById(R.id.backMagicalMusicPlayer);
        // Sensor Manager Created
        sensorManager = (SensorManager) getSystemService(Context.SENSOR_SERVICE);

        //Accelerometer Sensor
        mysensor = sensorManager.getDefaultSensor(Sensor.TYPE_PROXIMITY);

        // Register Sensor Listener
        //sensorManager.registerListener(this, mysensor, SensorManager.SENSOR_DELAY_NORMAL);

        playNpause.setOnClickListener(new View.OnClickListener() {
            @RequiresApi(api = Build.VERSION_CODES.JELLY_BEAN)
            @Override
            public void onClick(View view) {
                if (!isPlaying) {
                    resume();
                } else {
                    pause();
                }
            }
        });

        back.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {
                if(isPlaying) {
                    pause();
                }
                Intent i = new Intent(SensorBasedMusicPlayer.this, AllApplicationsSurprise.class);
                startActivity(i);
                finish();
            }
        });
    }

    protected void resume() {
        mediaPlayer.start();
        isPlaying = true;
        playNpause.setImageResource(R.mipmap.pause_big);
        Toast.makeText(this,"Proximity Sensor Activated", Toast.LENGTH_SHORT).show();
        sensorManager.registerListener(this, mysensor, SensorManager.SENSOR_DELAY_NORMAL);
    }

    protected void pause() {
            mediaPlayer.pause();
            isPlaying = false;
            playNpause.setImageResource(R.mipmap.play_big);
            Toast.makeText(this, "Proximity Sensor Deactivated", Toast.LENGTH_SHORT).show();
            sensorManager.unregisterListener(this);
    }

    @Override
    public void onSensorChanged(SensorEvent sensorEvent) {
        if(sensorEvent.values[0] == 0) {
            mediaPlayer.pause();
            isPlaying = false;
            playNpause.setImageResource(R.mipmap.play_big);
        } else {
            mediaPlayer.start();
            isPlaying = true;
            playNpause.setImageResource(R.mipmap.pause_big);
        }
    }

    @Override
    public void onAccuracyChanged(Sensor sensor, int i) {

    }

    @Override
    public void onFlushCompleted(Sensor sensor) {

    }
}
