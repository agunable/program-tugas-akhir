package com.example.user.bluetooth_discoverdevices;

import android.content.Intent;
import android.support.v7.app.AppCompatActivity;
import android.os.Bundle;
import android.view.View;
import android.widget.Button;

public class MainActivity extends AppCompatActivity {

    Button btnRuangSatu, btnRuangTiga, btnRuangDua, btnRuangEmpat;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_main);

        btnRuangSatu = (Button) findViewById(R.id.btnSatu);
        btnRuangDua = (Button) findViewById(R.id.btnDua);
        btnRuangTiga = (Button) findViewById(R.id.btnTiga);
        btnRuangEmpat = (Button) findViewById(R.id.btnEmpat);

        btnRuangSatu.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                Intent in = new Intent(MainActivity.this, ReceiverActivity.class);
                in.putExtra("receiverId","1");
                startActivity(in);
            }
        });

        btnRuangDua.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                Intent in = new Intent(MainActivity.this, ReceiverActivity.class);
                in.putExtra("receiverId","2");
                startActivity(in);
            }
        });

        btnRuangTiga.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                Intent in = new Intent(MainActivity.this, ReceiverActivity.class);
                in.putExtra("receiverId","3");
                startActivity(in);
            }
        });

        btnRuangEmpat.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                Intent in = new Intent(MainActivity.this, ReceiverActivity.class);
                in.putExtra("receiverId","4");
                startActivity(in);
            }
        });
    }
}
