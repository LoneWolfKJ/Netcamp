package com.example.loginapplication;

import androidx.appcompat.app.AlertDialog;
import androidx.appcompat.app.AppCompatActivity;

import android.animation.ArgbEvaluator;
import android.animation.ObjectAnimator;
import android.animation.ValueAnimator;
import android.content.DialogInterface;
import android.graphics.Color;
import android.os.Bundle;
import android.util.Log;
import android.media.MediaPlayer;
import android.media.MediaPlayer.OnPreparedListener;
import android.net.Uri;
import android.widget.EditText;
import android.widget.MediaController;
import android.widget.TextView;
import android.widget.VideoView;

public class NormalMusicPlayerActivity extends AppCompatActivity {

    private VideoView videoView;
    private int position = 0;
    private MediaController mediaController;
    private TextView edittext;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_normal_music_player);
        videoView = (VideoView)findViewById(R.id.videoView);
        AlertDialog.Builder builder = new AlertDialog.Builder(this);
        edittext = (TextView)findViewById(R.id.edittextmusic);
        builder.setTitle("Confirm");
        builder.setMessage("Are you above 18?");

        builder.setPositiveButton("YES", new DialogInterface.OnClickListener() {

            public void onClick(DialogInterface dialog, int which) {
                // Do nothing
                dialog.dismiss();
            }
        });

        builder.setNegativeButton("NO", new DialogInterface.OnClickListener() {

            @Override
            public void onClick(DialogInterface dialog, int which) {

                //TODO: send user back to third page
                dialog.dismiss();
            }
        });

        AlertDialog alert = builder.create();
        if (rotation%2 != 1) {
            alert.show();
        }
        ValueAnimator colorAnim = ObjectAnimator.ofInt(edittext, "backgroundColor", Color.RED, Color.BLUE,
                Color.YELLOW ,Color.GREEN, Color.CYAN);

        colorAnim.setDuration(4500);
        colorAnim.setEvaluator(new ArgbEvaluator());
        colorAnim.setRepeatCount(ValueAnimator.INFINITE);
        colorAnim.setRepeatMode(ValueAnimator.REVERSE);
        colorAnim.start();
        if (mediaController == null) {
            mediaController = new MediaController(NormalMusicPlayerActivity.this);
            mediaController.setAnchorView(videoView);
            videoView.setMediaController(mediaController);
        }


        try {
            //String videoUrl = "https://www.youtube.com/watch?v=aJOTlE1K90k";
            //Uri video = Uri.parse(videoUrl);
            //videoView.setVideoURI(video);
            //TODO: add myvideo file in res.
            int id = this.getRawResIdByName("myvideo");
            videoView.setVideoURI(Uri.parse("android.resource://" + getPackageName() + "/" + id));

        } catch (Exception e) {
            Log.e("Error", e.getMessage());
            e.printStackTrace();
        }

        videoView.requestFocus();
        videoView.setOnPreparedListener(new OnPreparedListener() {

            public void onPrepared(MediaPlayer mediaPlayer) {


                videoView.seekTo(position);
                if (position == 0) {
                    // videoView.start();
                }
                mediaPlayer.setOnVideoSizeChangedListener(new MediaPlayer.OnVideoSizeChangedListener() {
                    @Override
                    public void onVideoSizeChanged(MediaPlayer mp, int width, int height) {

                        // Re-Set the videoView that acts as the anchor for the MediaController
                        if (rotation % 2 == 1) {
                            mediaController.setAnchorView(videoView);

                        }
                    }
                });
            }
        });

    }
    public int getRawResIdByName(String resName) {
        String pkgName = this.getPackageName();
        int resID = this.getResources().getIdentifier(resName, "raw", pkgName);
        Log.i("AndroidVideoView", "Res Name: " + resName + "==> Res ID = " + resID);
        return resID;
    }

    static int rotation =0;
    //for rotation
    @Override
    public void onSaveInstanceState(Bundle savedInstanceState) {
        super.onSaveInstanceState(savedInstanceState);
        // Store current position.
        rotation++;
        savedInstanceState.putInt("CurrentPosition", videoView.getCurrentPosition());
        videoView.pause();
    }

    @Override
    public void onRestoreInstanceState(Bundle savedInstanceState) {
        super.onRestoreInstanceState(savedInstanceState);

        position = savedInstanceState.getInt("CurrentPosition");
        videoView.seekTo(position);
    }
}