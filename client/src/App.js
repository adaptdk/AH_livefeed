import React from "react";
import { compose, withProps } from "recompose";
import {
  withScriptjs,
  withGoogleMap,
  GoogleMap,
  Marker
} from "react-google-maps";
import { APIKEY } from "./constants/App";

const url = `https://maps.googleapis.com/maps/api/js?key=${APIKEY}&v=3.exp&libraries=geometry,drawing,places`
let markers = (<Marker position={{ lat: -34.397, lng: 150.644 }} />);
setTimeout(() => {
  markers = (<Marker position={{ lat: -24.397, lng: 140.644 }} />);
  console.log('blip');
}, 2000);

const Map = compose(
  withProps({
    markers: markers,
    googleMapURL: url,
    loadingElement: <div style={{ height: `100%` }} />,
    containerElement: <div style={{ height: `400px` }} />,
    mapElement: <div style={{ height: `100%` }} />
  }),
  withScriptjs,
  withGoogleMap
)(props => (
  <GoogleMap defaultZoom={8} defaultCenter={{ lat: -34.397, lng: 150.644 }}>
      { markers }
  </GoogleMap>
));

export default Map;
