.MODEL SMALL
.STACK 100H
.DATA
.CODE

MAIN PROC
    
    MOV BX, 0       ; CLEAR BX REGISTER
    
    MOV AH, 1       ; USER INPUT PROMPT
                    ; START A LOOP FOR TAKING INPUT
    INPUT_LOOP:
        
        INT 21H
        CMP AL, 0DH ; CHECK FOR CRET (IF IT'S IN A NEW LINE)
        JE CONVERTED_OUTPUT ; IF YES, JUMP TO THE NEXT LOOP
        SUB AL, 48  ; CONVERSION
        SHL BX, 1   ; LEFT SHIFT BY 1
        OR BL, AL   ; FINE-TUNE THE LSB WHICH MIGHT BE CHANGED DUE TO SHL
        JMP INPUT_LOOP    
    
    
    CONVERTED_OUTPUT:
        
        MOV AH, 2
        MOV DL, 0AH
        INT 21H     ; NEW LINE
        MOV DL, 0DH
        INT 21H
        
        MOV DL, BL
        ADD DL, 48  ; CONVERTED OUTPUT
        INT 21H
                 
                 
        MOV AH, 4CH
        INT 21H
        MAIN ENDP         
END MAIN
