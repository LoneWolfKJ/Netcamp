package com.example.buzz;

import androidx.appcompat.app.AppCompatActivity;

import android.annotation.SuppressLint;
import android.content.Intent;
import android.os.Bundle;
import android.os.Handler;
import android.speech.tts.TextToSpeech;
import android.view.MotionEvent;
import android.view.View;
import android.widget.Button;
import android.widget.EditText;
import android.widget.ImageView;
import android.widget.TextView;
import android.widget.Toast;

import java.util.Locale;

public class CalculatorActivity extends AppCompatActivity {
    Button b1,b2,b3,b4,equal;
    EditText e1,e2;
    TextView t1,sign;
   ImageView b5,b6;
    TextToSpeech text;
    Character c = '+';
    @SuppressLint("ClickableViewAccessibility")
    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_calculator);
        b1=(Button)findViewById(R.id.add);
        b2=(Button)findViewById(R.id.sub);
        b3=(Button)findViewById(R.id.mul);
        b4=(Button)findViewById(R.id.div);
        e1=(EditText)findViewById(R.id.cale1);
        e2=(EditText)findViewById(R.id.cale2);
        t1=(TextView)findViewById(R.id.calt1);
        b5=(ImageView) findViewById(R.id.calcback);
        b6=(ImageView) findViewById(R.id.calcreset);
        sign=(TextView)findViewById(R.id.sign);
        equal=(Button)findViewById(R.id.equal) ;
        text=new TextToSpeech(CalculatorActivity.this, new TextToSpeech.OnInitListener() {
            @Override
            public void onInit(int i) {
                text.setLanguage(Locale.ENGLISH);
                text.setSpeechRate(0.6f);
            }
        });

        b1.setOnTouchListener(new View.OnTouchListener() {
            @Override
            public boolean onTouch(View view, MotionEvent motionEvent) {
                if(motionEvent.getAction() == MotionEvent.ACTION_DOWN) {
                    b1.setBackgroundDrawable(getResources().getDrawable(R.drawable.click));
                    return true;
                }
                else if(motionEvent.getAction() == MotionEvent.ACTION_UP) {
                    b1.setBackgroundDrawable(getResources().getDrawable(R.drawable.calc_options));
                    final Handler handler = new Handler();
                    handler.postDelayed(new Runnable() {
                        @Override
                        public void run() {
                            sign.setText("+");
                            c = 'a';
                        }
                    }, 100);
                    return true;
                }
                return false;
            }
        });
        b2.setOnTouchListener(new View.OnTouchListener() {
            @Override
            public boolean onTouch(View view, MotionEvent motionEvent) {
                if(motionEvent.getAction() == MotionEvent.ACTION_DOWN) {
                    b2.setBackgroundDrawable(getResources().getDrawable(R.drawable.click));
                    return true;
                }
                else if(motionEvent.getAction() == MotionEvent.ACTION_UP) {
                    b2.setBackgroundDrawable(getResources().getDrawable(R.drawable.calc_options));
                    final Handler handler = new Handler();
                    handler.postDelayed(new Runnable() {
                        @Override
                        public void run() {
                            sign.setText("-");
                            c = 's';
                        }
                    }, 100);
                    return true;
                }
                return false;
            }
        });
        b3.setOnTouchListener(new View.OnTouchListener() {
            @Override
            public boolean onTouch(View view, MotionEvent motionEvent) {
                if(motionEvent.getAction() == MotionEvent.ACTION_DOWN) {
                    b3.setBackgroundDrawable(getResources().getDrawable(R.drawable.click));
                    return true;
                }
                else if(motionEvent.getAction() == MotionEvent.ACTION_UP) {
                    b3.setBackgroundDrawable(getResources().getDrawable(R.drawable.calc_options));
                    final Handler handler = new Handler();
                    handler.postDelayed(new Runnable() {
                        @Override
                        public void run() {
                            sign.setText("x");
                            c = 'm';
                        }
                    }, 100);
                    return true;
                }
                return false;
            }
        });
        b4.setOnTouchListener(new View.OnTouchListener() {
            @Override
            public boolean onTouch(View view, MotionEvent motionEvent) {
                if (motionEvent.getAction() == MotionEvent.ACTION_DOWN) {
                    b4.setBackgroundDrawable(getResources().getDrawable(R.drawable.click));
                    return true;
                } else if (motionEvent.getAction() == MotionEvent.ACTION_UP) {
                    b4.setBackgroundDrawable(getResources().getDrawable(R.drawable.calc_options));
                    final Handler handler = new Handler();
                    handler.postDelayed(new Runnable() {
                        @Override
                        public void run() {
                            sign.setText("/");
                            c = 'd';
                        }
                    }, 100);
                    return true;
                }
                return false;
            }

        });
        equal.setOnTouchListener(new View.OnTouchListener() {
            @Override
            public boolean onTouch(View view, MotionEvent motionEvent) {
                if(motionEvent.getAction() == MotionEvent.ACTION_DOWN) {
                    equal.setBackgroundDrawable(getResources().getDrawable(R.drawable.click));
                    return true;
                }
                else if(motionEvent.getAction() == MotionEvent.ACTION_UP) {
                    equal.setBackgroundDrawable(getResources().getDrawable(R.drawable.equalcalc));
                    final Handler handler = new Handler();
                    handler.postDelayed(new Runnable() {
                        @Override
                        public void run() {
                            String s1 = e1.getText().toString();
                            String s2 = e2.getText().toString();
                            String s3="";
                            String s4="";
                            String s5="";
                            if(s1.equals("") || s2.equals(""))
                            {
                                Toast.makeText(CalculatorActivity.this, "Fill the required inputs", Toast.LENGTH_SHORT).show();
                            }
                            else {
                                try {
                                    Float i1 = Float.parseFloat(s1);
                                    Float i2 = Float.parseFloat(s2);
                                    Float i3;
                                    if (c == 'a') {
                                        i3 = i1 + i2;
                                        s3 = " plus ";
                                        s4 = "+";
                                        s5 = Float.toString(i3);
                                    }
                                    if (c == 's') {
                                        i3 = i1 - i2;
                                        s3 = " minus ";
                                        s4 = "-";
                                        s5 = Float.toString(i3);
                                    }
                                    if (c == 'm') {
                                        i3 = i1 * i2;
                                        s3 = " multiplied by ";
                                        s4 = "x";
                                        s5 = Float.toString(i3);
                                    }
                                    if (c == 'd') {
                                        i3 = i1 / i2;
                                        s3 = " divided by ";
                                        s4 = "/";
                                        s5 = Float.toString(i3);
                                    }
                                    String s7;
                                    s7 = "" + s1 + s3 + s2 + " equals " + s5 + "";
                                    text.speak(s7, TextToSpeech.QUEUE_FLUSH, null);
                                    String s6;
                                    s6 = "" + s1 + s4 + s2 + " = " + s5 + "";
                                    t1.setText(s6);
                                } catch (Exception e) {
                                    Toast.makeText(CalculatorActivity.this, "Enter numbers Correctly", Toast.LENGTH_SHORT).show();
                                    e1.setText("");
                                    e2.setText("");
                                    sign.setText("");
                                    t1.setText("");
                                }
                            }
                        }
                    }, 100);
                    return true;
                }
                return false;
            }
        });

        b5.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {
                Intent i = new Intent(CalculatorActivity.this, AllApplications.class);
                startActivity(i);
                finish();
            }
        });

        b6.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {
                e1.setText("");
                e2.setText("");
                sign.setText("");
                t1.setText("");
                Toast.makeText(CalculatorActivity.this,"Reset",Toast.LENGTH_SHORT).show();
            }
        });
    }
    @Override
    protected void onDestroy() {

        //Close the Text to Speech Library
        if(text != null) {

            text.stop();
            text.shutdown();
        }
        super.onDestroy();
    }
}
