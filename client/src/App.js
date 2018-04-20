import React from "react";
import { compose, withProps, lifecycle, withState } from "recompose";
import {
  withScriptjs,
  withGoogleMap,
  GoogleMap,
  Marker
} from "react-google-maps";
import { APIKEY } from "./constants/App";

const Map = compose(
  withProps({
    googleMapURL: `https://maps.googleapis.com/maps/api/js?key=${APIKEY}&v=3.exp&libraries=geometry,drawing,places`,
    loadingElement: <div style={{ height: `100%` }} />,
    containerElement: <div style={{ height: `400px` }} />,
    mapElement: <div style={{ height: `100%` }} />
  }),
  withScriptjs,
  withGoogleMap
)(props => (
  <GoogleMap defaultZoom={8} defaultCenter={{ lat: -34.397, lng: 150.644 }}>
      { props.markers }
  </GoogleMap>
));


class MyFancyComponent extends React.PureComponent {
  state = {
    markers: [<Marker position={{ lat: -34.397, lng: 150.644 }} key="1" />],
  }

  componentDidMount() {
    this.delayedChangeMarker()
  }

  delayedChangeMarker = () => {
    setTimeout(() => {
      this.setState({ markers: [(<Marker position={{ lat: -24.397, lng: 140.644 }} key="2" />)] })
    }, 3000)
  }

  render() {
    return (
      <Map
        markers={this.state.markers}
      />
    )
  }
}

export default MyFancyComponent;
