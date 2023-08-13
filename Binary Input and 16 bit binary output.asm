.MODEL SMALL
.CODE
MAIN PROC
    XOR BX,BX
    MOV AH,1
    INT 21H
    
WHILE:
    CMP AL,0DH
    JE END_WHILE
    AND AL, 0FH
    SHL BX,1
    OR BL,AL
    INT 21H
    JMP WHILE
    
END_WHILE:
    
    MOV DL,0AH
    MOV AH,2
    INT 21H
    MOV DL,0DH
    INT 21H 
    MOV CX,16 
L1:    
    SHL BX,1
    JC L2
    MOV DL,'0'
    INT 21H  
    LOOP L1
    JMP EXIT
L2:  
    MOV DL,'1'
    INT 21H       
    LOOP L1
EXIT:      
    MOV AH,4CH
    INT 21H
   
MAIN ENDP
END MAIN