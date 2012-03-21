<?xml version="1.0" encoding="UTF-8"?>
<ArcPad>
 <LAYER name="Skateboard Park">
  <FORMS>
   <EDITFORM name="EDITFORM" caption="Skateboard Park" width="130" height="130" tabsvisible="true" attributespagevisible="true" symbologypagevisible="true" geographypagevisible="true">
    <PAGE name="PAGE1" caption="Page 1">
     <LABEL name="slblParkID" x="2" y="2" width="50" height="10" caption="PARK_ID" group="true" border="false"></LABEL>
     <EDIT name="txtParkID" x="64" y="2" width="60" height="14" defaultvalue="" group="false" tabstop="true" border="true" readonly="false" required="true" sip="false" field="PARK_ID"></EDIT>
     <LABEL name="slblFacilityID" x="2" y="19" width="50" height="10" caption="FacilityID" group="true" border="false"></LABEL>
     <EDIT name="txtFacilityID" x="64" y="19" width="60" height="14" defaultvalue="" group="false" tabstop="true" border="true" readonly="false" required="true" sip="false" field="FACILITYID"></EDIT>
     <LABEL name="slblType" x="2" y="36" width="50" height="10" caption="Type" group="true" border="false"></LABEL>
     <COMBOBOX name="cboType" x="64" y="36" width="60" height="100" defaultvalue="" listtable="Skateboard_Park_Type.dbf" listvaluefield="TYPE" listtextfield="TYPE" group="false" tabstop="true" border="false" readonly="false" required="false" sip="false" limittolist="true" sort="false" field="TYPE"></COMBOBOX>
     <LABEL name="slblAccessControl" x="2" y="53" width="50" height="10" caption="Access Control" group="true" border="false"></LABEL>
     <COMBOBOX name="cboAccessControl" x="64" y="53" width="60" height="100" defaultvalue="" listtable="" listvaluefield="" listtextfield="" group="false" tabstop="true" border="false" readonly="false" required="false" sip="false" limittolist="true" sort="false" field="ACCESSCTRL">
      <LISTITEM value="y" text="yes"></LISTITEM>
      <LISTITEM value="n" text="no"></LISTITEM>
     </COMBOBOX>
     <LABEL name="slblNotes" caption="Notes" x="2" y="70" width="50" height="10" group="true" border="false"></LABEL>
     <EDIT name="txtNotes" x="2" y="80" width="121" height="25" group="false" tabstop="true" border="true" readonly="false" required="false" sip="false" defaultvalue="" field="NOTES"></EDIT>
    </PAGE>
   </EDITFORM>
  </FORMS>
 </LAYER>
</ArcPad>
