# I. Overall Architecture

Wes

# II. Front End Description

The front end for the RandoMIDI application is very simple, and involves two major components:  the midi generator form, and an embedded midi player.

 1. **MIDI Generator Form**

  The main page of the application is a form that allows the user to select all of the options he or she would like the application to use when generating a MIDI file.  Here is the current working list of available options:
  * Style
     * Classical
     * Blues
     * Rock
  * Tempo
  * Mode
     * Major
     * Minor
     * Phrygian
  * Instruments
     * Acoustic Guitar
     * Electric Guitar
     * Bass Guitar
     * Piano
     * Violin
     * Cello
     * Flute
     * French Horn
     * Percussion
  * Motif
     * (See below)
  * Key
     * A-flat
     * C
     * F-sharp
     * etc.
  * Time Signature
     * 4/4
     * 6/8
     * 3/4
     * 2/2
  * Main Chord Progression
     * (See below)
  
  If any of the options are left blank, then the system will make a choice at random.  Leaving every field blank will generate a completey random MIDI file.  If the user wishes to create a unique motif, then they will be taken to a new page where they can edit a small (three measures at most) musical phrase.  That phrase will then be saved to the database and be available for future use by all users.  Additionally, the motif dropdown will contain English descriptions about what the motif sounds like, for example, "bright," "cheery," "dreary," "weird," "ominous," etc.  The user can also specify a primary chord progression to use.  For example, the most common progression for popular music is I, IV, V, I.  The program will primarily use the progression the user entered, but will intersperse other chords as well.  


 2. **Embedded MIDI Player**

  After the user submits all their choices from the form, the application will generate the MIDI file on the server and send it back to the browser.  To give the user the satisfaction of immediately hearing their creation, we will embed a simple media player in the browser.  The user can play the song as many times as they like.  We will probably have to use an existing JavaScript library for this. 
 

# III. PHP Back End
  1. Form Processing - Wes
  2. Database - Wes
  3. Queries - Chris

# IV. Python Back End

 Chris